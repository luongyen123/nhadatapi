<?php

namespace App\Http\Controllers;

use App\Quanhuyen;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
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
}
