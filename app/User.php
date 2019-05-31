<?php

namespace App;

use App\Tintuc;
use App\Tinmuaban;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *role ==0 admin
     * role =1 editor 
     * 
     * @var array
     */
    protected $fillable = [
        'name', 'email','password','avartar','role','status'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function tinmuabans(){
        return $this->hasMany(Tinmuaban::class);
    }
    public function tintuc(){
        return $this->hasMany(Tintuc::class);
    }
    public static function userCreate($data)
    {
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'avartar' => env('APP_URL').'/avatars/default.jpg',
            "role"=>1,
            'status'=>1
        ]);
        return $user;
    }
    public static function editUser($data,$id)
    {
        $user = User::findorFail($id);

        $user->name = $data['name_user'];
        $user->avartar = $data['anh'];
        $user->role = $data['role'];
      
        if($data['password'] != "none"){
           $user->password =  Hash::make($data['password']);
        }
        $user->save();
        return $user;
    }

}
