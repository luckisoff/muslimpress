<?php
namespace App\Http\Repositories;

use App\Models\News;

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

    public function getNews($last_id = null ){
        if($last_id){
            $this->model = $this->model->where('id', '<', $last_id);
        }

        return $this->model->limit(settings('per_page'))->get();
    }

    public function listLatest(){
        return $this->model->where('locale', app()->getLocale())->select('id','slug','title')->orderBy('created_at', 'desc')->limit(1)->get();
    }
}