<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

trait MediaClass
{

    public function upload($user_name, $image_base64)
    {

         $path = str_replace(' ', '', $user_name);
        

        @list($type, $image_base64) = explode(';', $image_base64);
        @list(, $image_base64) = explode(',', $image_base64);
        $filename =  'image_'.str_random(3).".". explode('/', $type)[1];
        //generating unique file name;
        // dd($image_base64);
        if ($image_base64 != "") { // storing image in storage/app/public Folder
            Storage::disk('uploads')->put($path . '/' . $filename, base64_decode($image_base64));  
            $link = env('APP_URL')."/uploads/".$path . '/' . $filename;       
        }

        return $link;
    }

}
