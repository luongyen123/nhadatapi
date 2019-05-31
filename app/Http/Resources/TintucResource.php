<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TintucResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tieude' => $this->tieude,
            'user'=>$this->user->name,
            'anh'=>$this->anh_daidien,
            'chitiet'=>$this->chitiet
        ];
    }
}