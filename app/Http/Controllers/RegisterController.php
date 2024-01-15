<?php

namespace App\Http\Controllers;
use App\Http\Requests\registerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class RegisterController extends Controller
{
    public function index(){
        return view("register");
    }
    public function store(registerRequest $request){
        $data=$request->validated();
        $data['password']=bcrypt($data['password']);
        $data['avatar']=request()->file("avatar")->store("avatars");
        $user=User::create($data);
        Auth::login($user);
        return redirect("/")->with("success","User Created Successfully!");
    }
}
