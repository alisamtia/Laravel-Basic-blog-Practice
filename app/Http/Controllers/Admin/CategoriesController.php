<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(){
        return view("admin.category.index",[
            "categories"=>Category::latest()->get()
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
        Category::create($categoryData);
        return redirect()->route("categories.index")->with("Category Created Successfully!");
    }

    public function edit(Category $category){
        return view("admin.category.edit",[
            "category"=>$category
        ]);
    }

    public function update(Category $category,CategoryRequest $request){
        $categoryData=$request->validated();
        $category->update($categoryData);
        return redirect()->route("categories.index")->with("Category Updated Successfully!");
    }
}
