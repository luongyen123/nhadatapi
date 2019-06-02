<?php

namespace App\Http\Controllers;

use App\Xaphuong;
use App\Quanhuyen;
use App\Tinmuaban;
use Illuminate\Support\Facades\DB;
use App\Loaitin;
use App\Tintuc;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        $tinban = Tinmuaban::paginate(12);
        $gialam = $this->getLoai("Gia Lâm");
        $longbien = $this->getLoai("Long Biên");
        return view('contents.frontend.index',\compact('tinban','gialam','longbien'));
    }
    protected function getLoai($ten){
        $nhadat = DB::table('xaphuong')
        ->join('quanhuyen','xaphuong.maqh','=','quanhuyen.id')
        ->select('quanhuyen.tenqh','quanhuyen.slug as qh_slug','xaphuong.tenxa','xaphuong.slug')
        ->where('quanhuyen.tenqh',$ten)
        ->get();
        return $nhadat;
    }
    public function muabanByQuanhuyen($slug){
        $quanhuyen_id = Quanhuyen::where('slug',$slug)->pluck('id')->first();
        $title = Quanhuyen::where('slug',$slug)->pluck('tenqh')->first();
        $tinban = Tinmuaban::where('maqh_id',$quanhuyen_id)->paginate(12);

        $gialam = $this->getLoai("Gia Lâm");
        $longbien = $this->getLoai("Long Biên");
        return view('contents.frontend.muabanByXaPhuong',\compact('tinban','gialam','longbien','title'));
    }

    public function muabanByXaPhuong($slug){
        $xaphuong_id = Xaphuong::where('slug',$slug)->pluck('id')->first();
        $title = Xaphuong::where('slug',$slug)->pluck('tenxa')->first();
        $title2 = DB::table('xaphuong')
                ->join('quanhuyen','xaphuong.maqh','=','quanhuyen.id')
                ->pluck('quanhuyen.tenqh')->first();
        $tinban = Tinmuaban::where('maxp_id',$xaphuong_id)->paginate(12);

        $gialam = $this->getLoai("Gia Lâm");
        $longbien = $this->getLoai("Long Biên");
        return view('contents.frontend.muabanByXaPhuong',\compact('tinban','gialam','longbien','title','title2'));
    }

    public function getTinban($slug){
        $tindetail = Tinmuaban::where('slug',$slug)->first();

        $gialam = $this->getLoai("Gia Lâm");
        $longbien = $this->getLoai("Long Biên");

        $tinban = Tinmuaban::where('maqh_id',$tindetail->maqh_id)
        ->where('id','<>',$tindetail->id)
        ->paginate(12);
        return view('contents.frontend.duancon',\compact('tinban','gialam','longbien','tindetail'));
    }
    public function getTinByLoaiTin($slug){
        $loaitin_id = Loaitin::where('slug',$slug)->pluck('id')->first();
        $title= Loaitin::where('slug',$slug)->pluck('Tenloaitin')->first();

        $tintuc = Tintuc::where('loaitin_id',$loaitin_id)
        ->orderBy('created_at','DESC')
        ->paginate();

        $gialam = $this->getLoai("Gia Lâm");
        $longbien = $this->getLoai("Long Biên");

       return view('contents.frontend.loaitin',\compact('tintuc','gialam','longbien','title'));
    }

    public function getTintuc($slug){
        $tindetail = Tintuc::where('slug',$slug) ->first();
        $loaitin = Loaitin::where('id',$tindetail->loaitin_id)->pluck('Tenloaitin')->first();

        $gialam = $this->getLoai("Gia Lâm");
        $longbien = $this->getLoai("Long Biên");

        $tintuc = Tintuc::where('loaitin_id',$tindetail->loaitin_id)
        ->where('id','<>',$tindetail->id)
        ->paginate(12);
        return view('contents.frontend.detailTin',\compact('tintuc','gialam','longbien','tindetail','loaitin'));
    }
}
