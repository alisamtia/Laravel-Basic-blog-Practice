<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CreateComment;

class CommentController extends Controller
{
    public function store(CreateComment $request){
        $data=$request->validated();
        $data['user_id']=request()->user()->id;
        Comment::create($data);
        return back()->with('success','Comment Published Successfully!');
    }

    public function destroy(Comment $comment){
        $comment->delete();
        return back()->with('success','Comment Deleted Successfully!');
    }
}
