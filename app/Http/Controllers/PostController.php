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
            "posts"=>Post::latest()->with(["category","author"])->paginate(10)
        ]);
    }

    public function show(Post $post){
        return view("show",["post"=>$post]);
    }

    public function authorFilter(User $user){
        return view("index",[
            "posts"=> $user->posts()->latest()
            ->with(["category","author"])
            ->paginate(10),
            "cPage"=>"Author / ".$user->username,
            "cName"=>"Filtered By Author: ".ucwords($user->username)
        ]);
    }

    public function categoryFilter(Category $category){
        return view("index",[
            "posts"=> $category->posts()->latest()
            ->with(["category","author"])
            ->paginate(10),
            "cPage"=>"Category / ".$category->name,
            "cName"=>"Filtered By Category: ".ucwords($category->name)
        ]);
    }
}
