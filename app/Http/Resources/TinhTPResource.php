<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TinhTPResource extends JsonResource
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
            'tinh' => $this->type." ".$this->tentinhtp,
        ];


    }
}