<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Post;

class FrontendController extends Controller
{
    public function index(){
        $setting=Setting::find(6);
        $all_categories=Category::where('status',0)->get();
        $latest_posts=Post::where('status',0)->orderBy('created_at','DESC')->get()->take(15);
        return view('frontend.index',compact('all_categories','latest_posts','setting'));
    }
    
    public function viewCategoryPost($category_slug){
        $category=Category::where('slug',$category_slug)->where('status',0)->first();
        if($category){
          $posts=Post::where('category_id',$category->id)->where('status',0)->paginate(2);
          return view('frontend.posts.index',compact('category','posts'));
        }
        else{
            return view('frontend.index');
        }
        
    }
    public function viewPost($category_slug,$post_slug){
        $category=Category::where('slug',$category_slug)->where('status',0)->first();
        if($category){
          $posts=Post::where('category_id',$category->id)->where('slug',$post_slug)->where('status',0)->first();
          $latest_posts=Post::where('category_id',$category->id)->where('status',0)->orderBy('created_at','DESC')->get();
          return view('frontend.posts.view',compact('posts','latest_posts'));
        }
        else{
            return view('frontend.index');
        }
    }
}
