<?php

namespace App\Http\Controllers;

use App\Tinh;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Resources\TinhTPCollection;

class TinhController extends Controller
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

    public function getTinh(Request $request){
        $data = Tinh::all();
        return $this->successResponseMessage(new TinhTPCollection($data),200,"Get Tinh success");
    }
    //
}
