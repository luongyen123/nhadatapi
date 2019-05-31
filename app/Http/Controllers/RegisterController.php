<?php

namespace App\Http\Controllers;

use App\User;
use Tymon\JWTAuth\JWTAuth;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class RegisterController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $jwt;
    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public function register(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password' => 'required|min:6',
        ]);
        $user = User::userCreate($request);
        return $this->successResponseMessage(new UserResource($user), 200, "Ban phai doi Admin phe duyet");
    }
}
