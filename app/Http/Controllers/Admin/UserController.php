<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    public function edit($user_id){
        $user=User::findOrFail($user_id);
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request,$user_id){

        $user=User::findOrFail($user_id);
        if($user){
            $user->role=$request->role;
            $user->update();
            return redirect(route('admin.users'))->with('message','User Updated Successfully');
        }
        else{
            return redirect(route('admin.users'))->with('message','User Not Found');
        }
    }
}
