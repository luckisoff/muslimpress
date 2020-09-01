<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Repositories\NewsRepository;

class NewsController extends MainController
{
    private $repo;

    function __construct(NewsRepository $repo){
        parent::__construct();
        $this->repo = $repo;
    }

    public function listNews(){
        $news = $this->repo->listLatest();
        return view('frontend.home', compact('news'));
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
