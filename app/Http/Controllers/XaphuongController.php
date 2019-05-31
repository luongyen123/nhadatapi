<?php

namespace App\Http\Controllers;

use App\Xaphuong;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Resources\XaphuongCollection;

class XaphuongController extends Controller
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

    public function getXaphuong(Request $request){
        $maqh = $request->maqh;
        $data = Xaphuong::where('maqh',$maqh)->get();
        return $this->successResponseMessage(new XaphuongCollection($data),200,"Get xa phuong success");
    }
    //
}
