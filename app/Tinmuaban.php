<?php
namespace App;
use App\Tinh;
use App\User;
use App\Xaphuong;
use App\Quanhuyen;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\TinmuabanResource;

class Tinmuaban extends Model
{
    protected $table = 'tinmuaban';
    protected $fillable = [
        'id','tieude','gia','dientich','vitri','maqh_id','matinh_id','anhdaidien','tiente','dvdt','user_id','chitiet','maxp_id','slug','status'
    ];
    //relationship
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function quanhuyen(){
        return $this->belongsTo(Quanhuyen::class);
    }
    public function tinhthanh(){
        return $this->belongsTo(Tinh::class);
    }
    public function xaphuong(){
        return $this->belongsTo(Xaphuong::class);
    }
    //end relationship

    public static function createTinmuaban($data){
        if($data['anh'] == ""){
            $data['anh'] = env('APP_URL')."/defautl.jpg";
        }
        $tinmuaban = Tinmuaban::create([
            'tieude'=>$data['tieude'],
            'gia'=>$data['gia'],
            'tiente'=>$data['tiente'],
            'dientich'=>$data['dientich'],
            'dvdt'=>$data['dvdt'],
            'vitri'=>$data['vitri'],
            'maqh_id'=>$data['quanhuyen'],
            'matinh_id'=>$data['tinhthanh'],
            'anhdaidien'=>$data['anh'],
            'user_id'=>$data['user_id'],
            'chitiet'=>$data['description'],
            'maxp_id'=>$data['xaphuong'],
            'slug'=>$data['slug'],
            'status'=>0
        ]);
        
        return new TinmuabanResource($tinmuaban);
    }
    public static function updateTinmua($data,$id){
        $tinmua = Tinmuaban::findorFail($id);

        $tinmua->tieude = $data['tieude'];
        $tinmua->gia = $data['gia'];
        $tinmua->tiente = $data['tiente'];
        $tinmua->dientich = $data['dientich'];
        $tinmua->dvdt = $data['dvdt'];
        $tinmua->vitri = $data['vitri'];
        $tinmua->matinh_id = $data['tinhthanh'];
        $tinmua->maqh_id = $data['quanhuyen'];
        $tinmua->maxp_id = $data['xaphuong'];
        $tinmua->user_id = $data['user_id'];
        $tinmua->anhdaidien = $data['anh'];
        $tinmua->chitiet = $data['description'];
        
        $tinmua->save();
        return new TinmuabanResource($tinmua);
    }
}