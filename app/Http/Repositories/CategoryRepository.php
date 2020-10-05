<?php
namespace App\Http\Repositories;

use App\Models\Category;

class CategoryRepository
{
    protected $model;

    function __construct(Category $model){
        $this->model = $model;
    }

    public function all(){
        return $this->model->orderBy('name','asc')->get();
    }

    public function listPaginated(){

        if(isWritter() && !isAdmin()) {
            $this->model = $this->model->where('id', admin()->id);
        }

        return $this->model->orderBy('created_at', 'desc')->paginate(settings('per_page'));
    }

    public function save($data = []){
        return $this->model->create($data);
    }

    public function update($data = [], Category $category){
        return $category->update($data);
    }

    public function delete(Category $category){
        if($category->delete()){
            return true;
        }

        return false;
    }

    public function getCategories($cat_id = null, $type = 'news'){

        $this->model = $this->model->whereHas('newsArticles', function($q) use ($type){
            $q->where('type', $type);
        })->orderBy('created_at', 'desc');

        if($cat_id){
            $this->model = $this->model->where('id', '<', $cat_id);
        }

        $this->model = $this->model->limit(5)->get();

        return $this->model;
    }
}