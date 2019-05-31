<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Redirect;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {       
        if(isset($_COOKIE['token'])){
            if($_COOKIE['token'] == null ||$_COOKIE['token'] == "" ||$_COOKIE['token'] == "null"){
                return $next($request);               
            }
        }                 
        return redirect('/admin/home');
        
        
    }
}
