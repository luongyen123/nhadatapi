<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use function Symfony\Component\Debug\Tests\testHeader;

class LoaitinResource extends JsonResource
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
            'tenloaitin' => $this->Tenloaitin,
        ];


    }
}
