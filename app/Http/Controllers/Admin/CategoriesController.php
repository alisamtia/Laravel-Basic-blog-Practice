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
            ->get()
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
        return redirect()->route("categories.index")->with("Category Created Successfully!");
    }

    public function edit(Category $category){
        if(Gate::allows('update-category',$category)){
            return view("admin.category.edit",[
                "category"=>$category
            ]);
        }else{
            abort(403);
        }
    }

    public function update(Category $category,CategoryRequest $request){
        $categoryData=$request->validated();
        $category->update($categoryData);
        return redirect()->route("categories.index")->with("Category Updated Successfully!");
    }
}
