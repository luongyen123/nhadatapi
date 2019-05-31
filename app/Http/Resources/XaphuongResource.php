<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class XaphuongResource extends JsonResource
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
            'tenxa' => $this->type." ".$this->tenxa,
        ];


    }
}