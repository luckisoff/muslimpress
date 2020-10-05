<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Common\MainApiController;
use App\Http\Repositories\CategoryRepository;

class CategoryApiController extends MainApiController
{
    function __construct(CategoryRepository $repo){
        $this->repo = $repo;
    }

    public function getCategories(){
        try {
            $cat_id = \request('cat_id')??null;

            $categories = $this->repo->getCategories($cat_id);


            return $this->success($categories, 'Categories fetching');

        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}
