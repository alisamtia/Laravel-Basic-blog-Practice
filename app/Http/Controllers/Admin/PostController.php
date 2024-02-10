<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\NewPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Category;
use Gate;

class PostController extends Controller
{
    public function index(){
        $user_condition=Gate::allows("admin") ? null : [['user_id', '=', auth()->user()->id]];
        return view("admin.post.index",[
            "posts"=>Post::latest()
            ->where($user_condition)
            ->with("category")->paginate(8)
        ]);
    }

    public function create(){
        return view("admin.post.new",[
            "categories"=>Category::latest()->get()
        ]);
    }

    public function store(NewPostRequest $request){
        $postData=$request->validated();

        $postData['thumbnail']=request()->file("thumbnail")->store("thumbnails");
        $postData['user_id']=request()->user()->id;
                
        Post::create($postData);
        return redirect()->route("posts.index")->with("success","Post Published Sucessfully");
    }

    public function destroy(Post $post){
        unlink($post->thumbnail);
        $post->delete();
        return redirect()->route("posts.index")->with("success","Post Deleted Successfully!");
    }

    public function edit(Post $post){
        $this->authorize('update', $post);
        return view('admin.post.edit',[
            "post"=>$post,
            "categories"=>Category::latest()->get()
        ]);
    }

    public function update(UpdatePostRequest $request,Post $post){

        $postData=$request->validated();
        if(isset($postData['thumbnail'])){
            $postData['thumbnail']=request()->file("thumbnail")->store("thumbnails");
        }
        $post->update($postData);
        return redirect()->route("posts.index")->with("success","Post Updated Successfully!");
    }
}
