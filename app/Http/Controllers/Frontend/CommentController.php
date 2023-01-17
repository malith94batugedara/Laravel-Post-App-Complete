<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function saveComment(Request $request){

        if(Auth::check()){
            $validator=Validator::make($request->all(),[
                 'comment_body'=>'required'   
            ]);
            if($validator->fails()){
                return redirect()->back()->with('message','Comment Area is mandatory!');
            }
           $post=Post::where('slug',$request->post_slug)->where('status',0)->first();
           if($post){
                $comment=new Comment;
                $comment->post_id=$post->id;
                $comment->user_id=Auth::user()->id;
                $comment->comment_body=$request->comment_body;

                $comment->save();
                return redirect()->back()->with('message','Comment Added Successfully!');
           }
           else{
            return redirect()->back()->with('message','No Such Post Found!');
           }
        }
        else{
            return redirect(route('login'))->with('message','Login first to comment');
        }
         
    }

    public function delete(Request $request){
        if(Auth::check()){

            $comment=Comment::where('id',$request->comment_id)->where('user_id',Auth::user()->id)->first();
            $comment->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Comment deleted Successfully'
            ]);
        }
        else{
           return response()->json([
             'status'=>401,
             'message'=>'Login to delete this comment'
           ]);
        }
    }
}
