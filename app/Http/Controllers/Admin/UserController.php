<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\CreateUser;
use Illuminate\Database\QueryException;

class UserController extends Controller
{

    public function index()
    {
        return view("admin.user.index",[
            "users"=>User::orderBy('role', 'asc')->paginate()
        ]);
    }


    public function create()
    {
        return view("admin.user.create");
    }


    public function store(CreateUser $request)
    {
        $data=$request->validated();
        $data['avatar']=request()->file("avatar")->store("avatars");
        $user=User::create($data);
        return redirect()->route("users.index")->with("success","User Created Successfully!");
    }


    public function edit(User $user)
    {
        return view("admin.user.edit",[
            "user"=>$user
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        $data=$request->validated();

        if(isset($data['avatar'])){
            $data['avatar']=request()->file("avatar")->store("avatars");
        }
        if($data['password']==""){
            unset($data['password']);
        }else{
            $data['password']=bcrypt($data['password']);
        }
        
        $user=$user->update($data);
        return redirect()->route("users.index")->with("success","User Updated Successfully!");
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route("users.index")->with("success","User Deleted Successfully!");
        } catch (QueryException $e) {
            return redirect()->route("users.index")->with("error","Can't Delete User, User Have Some Data!");
        }
    }
}
