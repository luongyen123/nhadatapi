<?php

namespace App\Http\Controllers;
use App\Loaitin;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Resources\LoaitinCollection;

class LoaitinController extends Controller
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

    public function getLoaitin(Request $request){
        $data = Loaitin::all();
        return $this->successResponseMessage(new LoaitinCollection($data),200,"Get Loaitin success");
    }
}
