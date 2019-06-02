<?php
namespace App;
use App\Tinmuaban;
use Illuminate\Database\Eloquent\Model;

class Xaphuong extends Model
{
    protected $table = 'xaphuong';
    protected $fillable = [
        'id','tenxa','maqh','type','slug'
    ];

    public function tinmuabans(){
        return $this->hasMany(Tinmuaban::class);
    }
    
    public static function createNews($data){
        $xaphuong = Xaphuong::create([
            'tenxa'=>$data['tenxa'],
            'maqh'=>$data['maqh'],
            'type'=>$data['type'],
            'slug'=>$data['slug']
        ]);
        return $xaphuong;
    }
}