<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Tymon\JWTAuth\JWTAuth;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class LoginController extends Controller
{
    use ApiResponser;

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

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);
        $user = User::where(['email' => $request->email])->first();
        if(isset($user)){
                if($user->status == 1){
                    return $this->successResponseMessage("", 415, "Admin chua xac thuc tai khoan");
                }else{
                    $data['token'] = $this->jwt->attempt($request->only('email', 'password'));
                    if ($data['token'] == false) {
                        return $this->successResponseMessage($data, 413, "Password inccorect");
                    } else {
                        $data['user'] = new UserResource($user);
                        return $this->successResponseMessage($data, 200, "Login success");
                    }
                }
                          
        }else{
            $data['token'] = false;
            return $this->successResponseMessage($data, 413, "Email inccorect");
        }

    }

    public function logout(Request $request){       
        Auth::logout();
        return $this->successResponseMessage(new \stdClass(), 200, "Logout success");
    }
}
