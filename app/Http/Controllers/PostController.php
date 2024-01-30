<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view("index",[
            "posts"=>Post::latest()->with(["category","author"])->paginate()
        ]);
    }

    public function show(Post $post){
        return view("show",["post"=>$post]);
    }

    public function authorFilter(User $user){
        return view("index",[
            "posts"=>Post::latest()
            ->with(["category","author"])
            ->where('user_id',$user->id)
            ->paginate()
        ]);
    }

    public function categoryFilter(Category $category){
        return view("index",[
            "posts"=>Post::latest()
            ->with(["category","author"])
            ->where('category_id',$category->id)
            ->paginate()
        ]);
    }
}
