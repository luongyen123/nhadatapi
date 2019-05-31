<?php
namespace App\Http\Resources;

use App\Http\Resources\TinhTPResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TinhTPCollection extends ResourceCollection
{

    public function toArray($request)
    {
 
        return [
            'datas' => TinhTPResource::collection($this->collection)
        ];
    }
}