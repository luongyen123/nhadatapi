<?php

namespace App\Http\Middleware;
use Closure;
use Mockery\Undefined;
use Tymon\JWTAuth\JWTAuth;

class AuthMiddleware
{
    protected $jwt;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public function handle($request, Closure $next,$guard = null)
    {
        $token = $request->cookie('token');
        if($token == null || $token == "" || $token == "null"){
            return redirect('/admin/login');
        }
        return $next($request);
        
        

    }
}
