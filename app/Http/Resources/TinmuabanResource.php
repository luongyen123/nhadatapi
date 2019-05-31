<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TinmuabanResource extends JsonResource
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
            'gia'=>$this->gia ." ". $this->tiente,
            'dientich'=>$this->dientich." ".$this->dvdt,
            'diachi'=>$this->vitri,
            'user'=>$this->user->name,
            'anh'=>$this->anhdaidien,
            'chitiet'=>$this->chitiet
        ];
    }
}