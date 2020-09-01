<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\NewsRepository;
use App\Http\Repositories\CategoryRepository;
use App\Http\Requests\NewsRequest;
use App\Models\News;

class NewsController extends MainAdminController
{
    protected $repo, $categoryRepo, $folder;

    function __construct(NewsRepository $repo, CategoryRepository $categoryRepo){
        $this->repo = $repo;

        $this->categoryRepo = $categoryRepo;
        
        $this->folder = 'news';
    }

    public function index($type = 'news'){
        
        $this->checkPermission();

        $news = $this->repo->listNewsPaginated($type);

        return view('admin.partials.news.index', compact('news'));
        
    }

    public function create($type = "news", News $news = null){
        try {
            $this->checkPermission();

            if(!in_array($type, ['article','news'])) throw new \Exception('Permission denied!');

            $categories = $this->categoryRepo->all();

            return view('admin.partials.news.create', compact('news', 'type', 'categories'));

        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function store(NewsRequest $request){
        try {
            
            $this->checkPermission();

            $user = auth()->user();

            $input = $request->all();

            $input['slug'] = $request->title;

            $input['user_id']   = $user->id;

            if(isAdmin()){
                $input['status'] = 'published';
            }

            if($request->image){
                $image_name = \uploadImage($request->image, $this->folder);
                $input['image'] = $image_name;
            }

            if(!$news = $this->repo->save($input)) throw new \Exception('Sorry! something went wrong!');

            if($request->categories){
                $news->categories()->attach($request->categories);
            }

            return redirect()->route('admin.news')->with('success', 'News Article Successfully Created');

        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage())->withInput();
        }
    }

    public function update(Request $request, News $news){
        try {
            $this->checkPermission($news->user_id);
    
            $user = auth()->user();
    
            $input = $request->all();
    
            $input['user_id']   = $user->id;
    
            $input['slug'] = $request->title;
    
            if($request->image){
    
                $image_name = \uploadImage($request->image, $this->folder);
    
                $input['image'] = $image_name;
                
                if($news->image){
                    \deleteImage($news->image, $this->folder);
                }
            }
    
            if(!$this->repo->update($input, $news)) throw new \Exception('Sorry! something went wrong!');
    
            if($request->categories){
    
                if($news->categories()->count()){

                    $news->categories()->detach($news->categories);
                }
    
                $news->categories()->attach($request->categories);
            }
    
            return redirect()->route('admin.news')->with('success', 'News Article Successfully Created');

        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage())->withInput();
        }
    }

    public function destroy(News $news){
        try {

            $this->checkPermission($news->user_id);

            if($news->status == 'published') abort(403,'Sorry! Published item can not be deleted! Contact Administrator.');
            if(!isAdmin()){
            }

            if(!$this->repo->delete($news)) throw new \Exception('Sorry! Can not delete this item.');

            if($news->image){
                \deleteImage($news->image, $this->folder);
            }

            return back()->with('success', 'Item successfully deleted.');

        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function view(News $news, $slug){
        try {
            if(!isAdmin()){
                if(!isOwner($news->id)) abort(403, 'Permission denied!');
            }

            if(!$news = $this->repo->detail($news, $slug)) abort(403, 'Item not found!');

            return view('admin.partials.news.view', compact('news'));

        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
