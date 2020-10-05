<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Http\Repositories\CategoryRepository;

class CategoryController extends MainAdminController
{
    protected $folder, $repo;
    function __construct(CategoryRepository $repo){
        $this->folder = 'categories';
        $this->repo = $repo;
    }

    public function index(){
        try {
            $this->checkPermission();
            $categories = $this->repo->listPaginated();
            return view('admin.partials.category.index', compact('categories'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function create(Category $category = null){
        try {

            $this->checkPermission( $category ? $category->user_id : '');

            return view('admin.partials.category.create', compact('category'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function store(CategoryRequest $request){
        try {

            $this->checkPermission();

            $input = $request->all();

            $input['user_id'] = auth()->user()->id;

            if($request->image){
                $input['image'] = \uploadImage($request->image, $this->folder);
            }

            if(!$category = $this->repo->save($input)) throw new \Exception('Something went wrong!');

            return back()->with('success','Category created. Add new.');


        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage())->withInput();
        }
    }

    public function update(Request $request, Category $category){
        try {

            $this->checkPermission($category->user_id);

            $user = auth()->user();

            if($user->id != $category->user_id) throw new \Exception('Permission denied');

            $input = $request->all();

            $input['user_id'] = $user->id;

            if($request->image){
                $input['image'] = \uploadImage($request->image, $this->folder);
                if($category->image){
                    \deleteImage($category->image, $this->folder);
                }
            }

            if(!$this->repo->update($input, $category)) throw new \Exception('Something went wrong!');

            return redirect()->route('admin.category')->with('success', 'Update successful');

        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage())->withInput();
        }
    }

    public function destroy(Category $category){
        try {

            $this->checkPermission($category->user_id);

            if(!$this->repo->delete($category)) throw new \Exception('Something went wrong!');

            if($category->image){
                \deleteImage($category->image, $this->folder);
            }

            return back()->with('success', 'Deleted!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


}
