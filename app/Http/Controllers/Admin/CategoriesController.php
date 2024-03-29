<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Gate;

class CategoriesController extends Controller
{
    public function index(){
        $user_condition=Gate::allows("admin") ? null : [['user_id', '=', auth()->user()->id]];
        return view("admin.category.index",[
            "categories"=>Category::latest()
            ->where($user_condition)
            ->paginate(8)
        ]);
    }

    public function create(){
        return view("admin.category.new");
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->route("categories.index")->with("success","Category Deleted Successfully!");
    }

    public function store(CategoryRequest $request){
        $categoryData=$request->validated();
        $categoryData['user_id']=auth()->user()->id;
        Category::create($categoryData);
        return redirect()->route("categories.index")->with("success","Category Created Successfully!");
    }

    public function edit(Category $category){
        $this->authorize('update', $category);
        return view("admin.category.edit",[
            "category"=>$category
        ]);
    }

    public function update(Category $category,CategoryRequest $request){
        $categoryData=$request->validated();
        $category->update($categoryData);
        return redirect()->route("categories.index")->with("success","Category Updated Successfully!");
    }
}
