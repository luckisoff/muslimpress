<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Common\MainApiController;
use Illuminate\Http\Request;
use App\Models\Category;
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
}
