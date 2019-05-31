<?php

namespace App\Http\Middleware;
use Closure;
use App\User;
use Mockery\Undefined;

class EditorMiddleware
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
        $user = $request->cookie('user');
        $user = \json_decode($user);
        $id = $request->id;
        
        /**
         * role == 0 is Admin
         */
        if($user->role == 2){
            return $next($request);
        }else{
            return redirect('/admin/middleware');
        }        
    }
}
