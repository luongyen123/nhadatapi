<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use function Symfony\Component\Debug\Tests\testHeader;

class MediaResource extends JsonResource
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
            'path' => $this->path,
            'user_id' => $this->user_id
        ];


    }
}
