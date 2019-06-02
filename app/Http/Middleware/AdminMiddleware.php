<?php

namespace App\Http\Middleware;
use Closure;
use App\User;
use Mockery\Undefined;

class AdminMiddleware
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
        
        if($user == null){
            $id = $request->auth;
       }else{
           $id= $user->id;
       }
        $user = User::findorFail($id);
        //quyen admin or quyen editor thi duoc them
        if($user->role == 0){
            return $next($request);
        }else{
            return redirect('/admin/middleware');
        }        
    }
}
