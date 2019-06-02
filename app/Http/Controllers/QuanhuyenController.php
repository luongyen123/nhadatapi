<?php

namespace App\Http\Controllers;

use App\Quanhuyen;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\QuanhuyenCollection;

class QuanhuyenController extends Controller
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

    public function getQuanhuyen(Request $request){
        $matinh = $request->matinh;
        $data = Quanhuyen::where('matinh',$matinh)->get();
        return $this->successResponseMessage(new QuanhuyenCollection($data),200,"Get Quanhuyen success");
    }
    public function getDS(){
        $data = DB::table('xaphuong')
        ->join('quanhuyen','xaphuong.maqh','=','quanhuyen.id')
        ->join('tinhtp','tinhtp.id','=','quanhuyen.matinh')
        ->select('xaphuong.tenxa','quanhuyen.tenqh','tinhtp.tentinhtp')
        ->paginate(10);
        $title = 'Page quanhuyen';
        $id = 'quanhuyen';
        return view('contents.quanhuyen',compact(['data','title','id']));
    }
}
