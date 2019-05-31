<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 3/25/2019
 * Time: 09:25
 */

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\MediaClass;

class MediaController extends Controller
{
    use MediaClass;

    public function uploadImage(Request $request){
        $image = $request->image;
        $user_name = $request->user_name;
        $url = $this->upload($user_name,$image);
       return $url;
    }
}