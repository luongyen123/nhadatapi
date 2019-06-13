<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';
    protected $fillable = [
        'id','media','status','order'
    ];

    public static function createNews($data){
        $banner = Banner::create([
            'media'=>$data['media'],
            'status'=>0,
            'order'=>0,
        ]);
        return $banner;
    }
}