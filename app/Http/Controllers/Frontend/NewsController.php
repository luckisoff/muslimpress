<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Http\Repositories\NewsRepository;

class NewsController extends MainController
{
    private $repo;

    function __construct(NewsRepository $repo){
        parent::__construct();
        $this->repo = $repo;
    }

    public function listNews($type = 'news', Category $category = null){
        $cat_name = \request('name')??null;
        $cat_id = $category->id??null;

        return view('frontend.home', compact('type','cat_name', 'cat_id'));
    }

    public function show(News $news, $slug){

        if(!$news = $this->repo->detail($news, $slug)) throw new \Exception(__('Nothing found'));
        
        \insertView($news);

        return view('frontend.news.detail', compact('news'));
        try {
        } catch (\Throwable $th) {
            return back()->with('error', __('Nothing found'));
        }
    }
}
