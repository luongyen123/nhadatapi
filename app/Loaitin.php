<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class Loaitin extends Model
{
    protected $table = 'loaitin';
    protected $fillable = [
        'id','Tenloaitin'
    ];
}