<?php

namespace App\Http\Controllers\Admin;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateComment;

class AdminComment extends Controller
{
    public function index(){
        return view("admin.comment.index",[
            "comments"=>Comment::latest()->paginate(8)
        ]);
    }
    public function edit(Comment $comment){
        return view("admin.comment.edit",[
            "comment"=>$comment
        ]);
    }
    public function update(UpdateComment $request,Comment $comment){
        $data=$request->validated();
        $comment->update($data);
        return redirect()->route("comments.index")->with("success","Post Updated Successfully");
    }
}
