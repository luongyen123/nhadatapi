<?php

namespace App\Http\Controllers;

use App\Info;
use App\Banner;
use App\Tintuc;
use App\Loaitin;
use App\Xaphuong;
use App\Quanhuyen;
use App\Tinmuaban;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;

class MainController extends Controller
{
    use ApiResponser;
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
        $tinban = Tinmuaban::where('status',0)
        ->orderBy('created_at','DESC')
        ->paginate(12);
        $banner_first = Banner::where('status',0)->orderBy('created_at','DESC')->first();
        $banner = Banner::where('status',0)
        ->where('id','<>',$banner_first->id)
        ->orderBy('created_at','DESC') 
        ->paginate(12);      
        return view('contents.frontend.index',\compact('tinban','banner','banner_first'));
    }
    
    public function muabanByQuanhuyen($slug){
        $quanhuyen_id = Quanhuyen::where('slug',$slug)->pluck('id')->first();
        $title = Quanhuyen::where('slug',$slug)->pluck('tenqh')->first();
        $tinban = Tinmuaban::where('maqh_id',$quanhuyen_id)
        ->where('status',0)
        ->orderBy('created_at','DESC')
        ->paginate(12);
        return view('contents.frontend.muabanByXaPhuong',\compact('tinban','title'));
    }

    public function muabanByXaPhuong($slug){
        $xaphuong_id = Xaphuong::where('slug',$slug)->pluck('id')->first();
        $title = Xaphuong::where('slug',$slug)->pluck('tenxa')->first();
        $title2 = DB::table('xaphuong')
                ->join('quanhuyen','xaphuong.maqh','=','quanhuyen.id')
                ->pluck('quanhuyen.tenqh')->first();
        $tinban = Tinmuaban::where('maxp_id',$xaphuong_id)
        ->where('status',0)
        ->orderBy('created_at','DESC')
        ->paginate(12);

        
        return view('contents.frontend.muabanByXaPhuong',\compact('tinban','title','title2'));
    }

    public function getTinban($slug){
        $tindetail = Tinmuaban::where('slug',$slug)->first();

        $tinban = Tinmuaban::where('maqh_id',$tindetail->maqh_id)
        ->where('id','<>',$tindetail->id)
        ->where('status',0)
        ->orderBy('created_at','DESC')
        ->paginate(12);
        return view('contents.frontend.duancon',\compact('tinban','tindetail'));
    }
    public function getTinByLoaiTin($slug){
        $loaitin_id = Loaitin::where('slug',$slug)->pluck('id')->first();
        $title= Loaitin::where('slug',$slug)->pluck('Tenloaitin')->first();

        $tintuc = Tintuc::where('loaitin_id',$loaitin_id)
        ->orderBy('created_at','DESC')
        ->paginate();

       return view('contents.frontend.loaitin',\compact('tintuc','title'));
    }

    public function getTintuc($slug){
        $tindetail = Tintuc::where('slug',$slug) ->first();
        $tin = Loaitin::where('id',$tindetail->loaitin_id)->pluck('Tenloaitin')->first();

        $tintuc = Tintuc::where('loaitin_id',$tindetail->loaitin_id)
        ->where('id','<>',$tindetail->id)
        ->paginate(12);
        return view('contents.frontend.detailTin',\compact('tintuc','tindetail','tin'));
    }

    public function addInfo(Request $request){
        $info = Info::createNews($request->all());
        return $this->successResponseMessage($info,200,"Tao thanh cong");
    } 
}
