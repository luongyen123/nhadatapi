<?php
namespace App;
use App\Http\Resources\TintucResource;
use Illuminate\Database\Eloquent\Model;

class Tintuc extends Model
{
    protected $table = 'tintuc';
    protected $fillable = [
        'id','tieude','loaitin_id','chitiet','anh_daidien','user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function createNews($data){
        $tintuc = Tintuc::create([
            'tieude'=>$data['tieude'],
            'loaitin_id'=>$data['loaitin'],
            'chitiet'=>$data['description'],
            'anh_daidien'=>$data['anh'],
            'user_id'=>$data['user_id']
        ]);
        return new TintucResource($tintuc);
    }

    public static function updateTintuc($data,$id){
        $tintuc = Tintuc::findorFail($id);

        $tintuc->tieude= $data['tieude'];
        $tintuc->chitiet = $data['description'];
        $tintuc->anh_daidien = $data['anh'];
        $tintuc->user_id = $data['user_id'];
        $tintuc->save();
        
        return new TintucResource($tintuc);
    }
}