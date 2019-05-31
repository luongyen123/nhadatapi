<?php

namespace App\Http\Middleware;
use Closure;
use App\User;
use App\Tinmuaban;
use Mockery\Undefined;

class TinmuabanMiddleware
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
            $id = $request->user_id;
       }else{
           $id= $user->id;
       }
       $user = User::findorFail($id);
       // dd($request->all());
       if(isset($request->id)){
           $tinId = $request->id;
       }else{
           $tinId = $request->news_id;
       }
        $tintuc = Tinmuaban::findorFail($tinId);

        //quyen admin or  la bai viet cua chinh no
        if($user->role == 0 || $tintuc->user_id == $user->id ){
            return $next($request);
        }else{
            return redirect('/admin/middleware');
        }        
    }
}
