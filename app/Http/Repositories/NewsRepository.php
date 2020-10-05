<?php
namespace App\Http\Repositories;

use App\Models\News;
use App\Models\Category;

class NewsRepository
{
    protected $model;

    function __construct(News $model){
        $this->model = $model;
    }

    public function save($data = []){
        return $this->model->create($data);
    }

    public function update($data = [], News $news){
        return $news->update($data);
    }

    public function delete(News $news){
        if($news->delete()) return true;
        return false;
    }

    public function listNewsPaginated($type = 'news'){

        if(isWritter() || isPublicWriter()){
            $this->model = $this->model->where('user_id', admin()->id);
        }

        return $this->model->where('type', $type)->orderBy('created_at','desc')->paginate(settings('per_page'));
    }

    public function detail(News $news, $slug){
        return $this->model->where('id', $news->id)->where('slug', $slug)->first();
    }

    public function getNews($type, $last_id = null, Category $category = null){
        
        if($category){
            $this->model = $this->model->whereHas('categories', function($q) use ($category){
                $q->where('categories.id', $category->id);
            });
        }else{
            $this->model = $this->model->where('type', $type);
        }

        if($last_id){
            $this->model = $this->model->where('id', '<', $last_id);
        }

        $this->model = $this->model
                        // ->where('locale', app()->getLocale())
                        ->select('news.id','locale', 'slug','title','image','summary');

        return $this->model
                // ->where('locale', app()->getLocale())
                // ->limit(settings('per_page'))
                ->limit(10)
                ->withCount('comments','views','likes')
                ->orderBy('created_at', 'desc')->get();
    }

    public function listLatest($type){
        return $this->model->where('type', $type)->where('locale', app()->getLocale())->select('id','slug','title','image','summary')->orderBy('created_at', 'desc')->limit(2)->get();
    }
}