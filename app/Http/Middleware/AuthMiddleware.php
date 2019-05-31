<?php

namespace App\Http\Middleware;
use Closure;
use Mockery\Undefined;

class AuthMiddleware
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
        if($token == null || $token == "" || $token == "null"){      
            return redirect('/admin/login');
        }else{
            return $next($request);
        }
        

    }
}
