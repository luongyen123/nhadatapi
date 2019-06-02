<?php
namespace App;


use App\Tinmuaban;
use Illuminate\Database\Eloquent\Model;

class Quanhuyen extends Model
{
    protected $table = 'quanhuyen';
    protected $fillable = [
        'id','tenqh','matinh','type','slug'
    ];

    //relationship
    public function tinmuabans(){
        return $this->hasMany(Tinmuaban::class);
    }

    public static function createNews($data){
        $quanhuyen = Quanhuyen::create([
            'matinh'=>$data['matinh'],
            'tenqh'=>$data['tenqh'],
            'slug'=>$data['slug'],
            'type'=>$data['type']
        ]);
        return $quanhuyen;
    }
}