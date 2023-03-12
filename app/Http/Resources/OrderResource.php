<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'paymentMethod' => $this->paymentMethod,
            'discount' => $this->discount,
            'coupon' => $this->coupon,
            'status' => $this->status,
            'total_product' => $this->total_product,
            'total_price' => $this->total_price,
            'shipMethod' => $this->shipMethod,
            'staff' => $this->staff,
            'customer' => $this->customer
        ];
    }
}
