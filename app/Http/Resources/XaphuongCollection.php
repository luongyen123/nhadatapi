<?php
namespace App\Http\Resources;

use App\Http\Resources\XaphuongResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class XaphuongCollection extends ResourceCollection
{

    public function toArray($request)
    {
 
        return [
            'datas' => XaphuongResource::collection($this->collection)
        ];
    }
}