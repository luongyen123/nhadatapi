<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'info_register';
    protected $fillable = [
        'id','hoten','sdt','nhucau','ghichu'
    ];

    public static function createNews($data){
        $info = Info::create([
            'hoten'=>$data['hoten'],
            'sdt'=>$data['sdt'],
            'nhucau'=>$data['nhucau'],
            'ghichu'=>$data['ghichu']
        ]);
        return $info;
    }
}