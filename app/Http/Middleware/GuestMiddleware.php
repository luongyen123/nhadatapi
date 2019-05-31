<?php

namespace App\Http\Middleware;
use Closure;

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
        $token = $request->cookie('token');
        dd($token);
        if($token != null || $token != "" || $token != "null"){
            return redirect('/admin/home');
        }else{

            return $next($request);
        }
        
    }
}
