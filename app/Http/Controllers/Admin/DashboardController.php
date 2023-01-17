<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        // return "i am dashboard";
        $categories=Category::count();
        $posts=Post::count();
        $users=User::where('role',0)->count();
        $admins=User::where('role',1)->count();
        return view('admin.dashboard',compact('categories','posts','users','admins'));
    }
}
