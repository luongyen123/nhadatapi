<?php
namespace App;
use App\Tinmuaban;
use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
    protected $table = 'tinhtp';
    protected $fillable = [
        'id','tentinhtp','type'
    ];

    public function tinmuabans(){
        return $this->hasMany(Tinmuaban::class);
    }
}