<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Common\MainApiController;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\User;
use App\Models\Comment;
use App\Http\Repositories\NewsRepository;

class NewsApiController extends MainApiController
{
    function __construct(NewsRepository $repo){
        $this->repo = $repo;
    }

    public function getNewsArticles($type = 'news', Category $category = null){
        try {
            
            if(!in_array($type, ['news', 'article','category'])) abort(404, 'Page not found');
            
            $last_id = request('last_id')??null;

            $articles = $this->repo->getNews($type, $last_id, $category);
            
            return $this->success($articles, 'news article fetch');

        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function likeReact(News $news){
        try {

            if(!$user = \Auth::user()) throw new \Exception(__('Please login to react!'));

            $like = $news->likes()->where('user_id', $user->id)->first();
            if($like){
                $like->delete();
            } else {
                $news->likes()->create(['user_id' => $user->id]);
            }

            return $this->success(['count' => $news->likes->count()], __('React Successful'));

        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function getComments(News $news){
        try {
            $comments = $news->comments()->with('user')->orderBy('comments.created_at', 'desc')->get();
            return $this->success($comments, 'comments fetching');
        } catch (\Throwable $th) {
           return $this->error($th->getMessage(), 200);
        }
    }

    public function createComment(Request $request, News $news){
        try {
            
            if(!$user = auth()->user()) throw new \Exception(__("Please login to comment!"));

            if(!$request->comment) throw new \Exception(__('Comment can not be empty!'));

            $comment = $news->comments()->create(['user_id' => $user->id, 'comment' => $request->comment]);

            return $this->success($comment->load('user'), __('Comment Successful'));

        } catch (\Throwable $th) {
           return $this->error($th->getMessage(), 200);
        }
    }

    public function deleteComment(Comment $comment){
        try {
            
            if(!$user = auth()->user()) throw new \Exception(__('Login to delete comment'));
            
            if($comment->user_id != $user->id) throw new \Exception(__('Permission denied'));

            if(!$comment->delete()) throw new \Exception(__('Unable to delete.'));

            return $this->success([], __('Successfully deleted comment'));

        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}
