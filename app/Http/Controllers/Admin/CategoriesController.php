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
        return redirect("/dashboard/categories")->with("success","Category Deleted Successfully!");
    }

    public function store(CategoryRequest $request){
        $Categorydata=$request->validated();
        Category::create($Categorydata);
        return redirect("/dashboard/categories")->with("Category Created Successfully!");
    }

    public function edit(Category $category){
        return view("admin.category.edit",[
            "category"=>$category
        ]);
    }

    public function update(Category $category,CategoryRequest $request){
        $Categorydata=$request->validated();
        $category->update($Categorydata);
        return redirect("/dashboard/categories")->with("Category Updated Successfully!");
    }
}
