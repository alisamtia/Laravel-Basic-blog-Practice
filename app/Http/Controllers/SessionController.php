<?php

namespace App\Http\Controllers;
use App\Http\Requests\sessionLogin;
use Illuminate\Http\Request;
use Auth;


class SessionController extends Controller
{
    public function index(){
        return view("login");
    }

    public function store(sessionLogin $credentials){
        $credentials=$credentials->validated();
        if(Auth::attempt(['email'=>$credentials['email'],"password"=>$credentials['password']])){
            return redirect("/")->with(['success',"You are Successfully Logged in!"]);
        }
        return back()->withErrors(['email'=>"Invalid Email or Password!"]);
    }

    public function destroy(){
        Auth::logout();
        return redirect('/')->with(["success"=>"You are logged out Successfully!"]);
    }
}
