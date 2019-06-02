<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class Loaitin extends Model
{
    protected $table = 'loaitin';
    protected $fillable = [
        'id','Tenloaitin','slug'
    ];

    public static function createNews($data){
        $loaitin = Loaitin::create([
            'Tenloaitin'=>$data['Tenloaitin'],
            'slug'=>$data['slug']
        ]);
        return $loaitin;
    }
}