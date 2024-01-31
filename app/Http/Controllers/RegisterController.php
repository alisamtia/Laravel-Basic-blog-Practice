<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view("register");
    }
    public function store(RegisterRequest $request){
        $data=$request->validated();
        $data['avatar']=request()->file("avatar")->store("avatars");
        $user=User::create($data);
        Auth::login($user);
        return redirect()->route("index")->with("success","User Created Successfully!");
    }
}
