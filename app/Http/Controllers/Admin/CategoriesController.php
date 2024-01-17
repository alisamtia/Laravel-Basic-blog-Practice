<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(){
        return view("admin.category.index",[
            "categories"=>Category::latest()->get()
        ]);
    }

    public function new(){
        return view("admin.category.new");
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect("/dashboard/categories")->with("success","Category Deleted Successfully!");
    }

    public function create(categoryRequest $request){
        $Categorydata=$request->validated();
        Category::create($Categorydata);
        return redirect("/dashboard/categories")->with("Category Created Successfully!");
    }

    public function edit(Category $category){
        return view("admin.category.edit",[
            "category"=>$category
        ]);
    }

    public function update(Category $category,categoryRequest $request){
        $Categorydata=$request->validated();
        $category->update($Categorydata);
        return redirect("/dashboard/categories")->with("Category Updated Successfully!");
    }
}
