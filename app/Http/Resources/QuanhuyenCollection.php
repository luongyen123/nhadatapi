<?php
namespace App\Http\Resources;

use App\Http\Resources\QuanhuyenResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuanhuyenCollection extends ResourceCollection
{

    public function toArray($request)
    {
 
        return [
            'datas' => QuanhuyenResource::collection($this->collection)
        ];
    }
}