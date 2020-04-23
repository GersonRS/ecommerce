<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'code' => $this->code,
            'value' => $this->value,
            'type' => $this->type,
            'establishment' => EstablishmentResource::make($this->whenLoaded('establishment')),
        ];
    }
}
