<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Adminmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
           if(Auth::user()->role == 1){//1 is admin & 0 is a user
              return $next($request);
           }
           else{
              return redirect(route('home'))->with('message','Access Denied You are Not an Admin');
           }
        }
        else{
            return redirect(route('login'))->with('message','Please login first');
        }
        
    }
}
