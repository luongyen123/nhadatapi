<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TinmuabanCollection extends ResourceCollection
{

    public function toArray($request)
    {
        $total_page = $this->total();
        return [
            'datas' => TinmuabanResource::collection($this->collection),
            'totalPage' => $total_page,
            'link'=>$this->links()
        ];
    }
}
