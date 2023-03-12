<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'parent_id' => $this->parent_id,
            'category' => $this->category,
            'brand' => $this->brand,
            'video' => $this->video,
            'attribute' => $this->attribute,
            'attributeValues' => $this->attributeValues,
            'warranty_period' => $this->warranty_period,
            'warranty_policy' => $this->warranty_policy,
            'price' => $this->price,
            'price_purchase' => $this->price_purchase,
            'slug' => $this->slug,
            'skus' => $this->code,
        ];
    }
}
