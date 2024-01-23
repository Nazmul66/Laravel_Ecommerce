<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if( Auth::check() ){
           if( Auth::user()->role == 1 ){
               return $next($request); 
           }
           else if (Auth::user()->role == 2 ){
            $notification = array(
            // 'message'    => "Has been successfully logged in",
                'message'    => "Sorry! you do not have permission to dashboard login",
                'alert-type' => "error",
            );

            return redirect()->route('homepage')->with($notification);
            // return redirect()->route('homepage');
           }
        }
        else{
            $notification = array(
                'message'    => "Sorry! you do not have permission to dashboard login",
                'alert-type' => "error"
            );
            
            return redirect()->route('login')->with($notification);
        }
    }
}
