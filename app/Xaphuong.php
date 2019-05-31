<?php
namespace App;
use App\Tinmuaban;
use Illuminate\Database\Eloquent\Model;

class Xaphuong extends Model
{
    protected $table = 'xaphuong';
    protected $fillable = [
        'id','tenxa','maqh','type'
    ];

    public function tinmuabans(){
        return $this->hasMany(Tinmuaban::class);
    }
}