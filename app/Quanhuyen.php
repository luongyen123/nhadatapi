<?php
namespace App;


use App\Tinmuaban;
use Illuminate\Database\Eloquent\Model;

class Quanhuyen extends Model
{
    protected $table = 'quanhuyen';
    protected $fillable = [
        'id','tenqh','matinh','type'
    ];

    //relationship
    public function tinmuabans(){
        return $this->hasMany(Tinmuaban::class);
    }
}