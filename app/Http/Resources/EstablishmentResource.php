<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EstablishmentResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,
            'number' => $this->number,
            'phone' => $this->phone,
            'image' => $this->image,
            'thumbnail' => $this->thumbnail,
            'active' => $this->active,
            'minimum_value' => $this->minimum_value,
            'delivery_fee' => $this->delivery_fee,
            'type' => $this->type,
            'orders' => OrderResource::collection($this->whenLoaded('orders')),
            'coupons' => CouponResource::collection($this->whenLoaded('coupons')),
            'user' => UserResource::make($this->whenLoaded('user')),
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'opening' => OpeningResource::collection($this->whenLoaded('opening')),
            'payments' => PaymentResource::collection($this->whenLoaded('payments')),
        ];
    }
}
