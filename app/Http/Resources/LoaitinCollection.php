<?php
namespace App\Http\Resources;

use App\Http\Resources\LoaitinResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LoaitinCollection extends ResourceCollection
{

    public function toArray($request)
    {
 
        return [
            'datas' => LoaitinResource::collection($this->collection)
        ];
    }
}