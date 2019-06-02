<?php
namespace App;
use App\Tinmuaban;
use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
    protected $table = 'tinhtp';
    protected $fillable = [
        'id','tentinhtp','type','slug'
    ];

    public function tinmuabans(){
        return $this->hasMany(Tinmuaban::class);
    }

    public static function createNews($data){
        $tinhtp = Tinh::create([
            'tentinhtp'=>$data['tentinhtp'],
            'type'=>$data['type'],
            'slug'=>$data['slug']
        ]);
        return $tinhtp;
    }
}