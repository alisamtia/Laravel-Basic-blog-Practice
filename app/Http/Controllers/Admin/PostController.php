<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\NewPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index(){
        return view("admin.post.index",[
            "posts"=>Post::latest()->get()
        ]);
    }

    public function create(){
        return view("admin.post.new",[
            "categories"=>Category::latest()->get()
        ]);
    }

    public function store(NewPostRequest $request){
        $postdata=$request->validated();

        $postdata['thumbnail']=request()->file("thumbnail")->store("thumbnails");
        $postdata['user_id']=request()->user()->id;
                
        Post::create($postdata);
        return redirect()->route("posts.index")->with("success","Post Published Sucessfully");
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route("posts.index")->with("success","Post Deleted Successfully!");
    }

    public function edit(Post $post){
        return view('admin.post.edit',[
            "post"=>$post,
            "categories"=>Category::latest()->get()
        ]);
    }

    public function update(UpdatePostRequest $request,Post $post){
        $Postdata=$request->validated();
        if(isset($Postdata['thumbnail'])){
            $Postdata['thumbnail']=request()->file("thumbnail")->store("thumbnails");
        }
        $post->update($Postdata);
        return redirect()->route("posts.index")->with("success","Post Updated Successfully!");
    }
}
