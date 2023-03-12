<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeResource extends JsonResource
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
            'code' => $this->code,
            'attributeValues' => new AttributeValueResource($this->whenLoaded('attributeValues')),
            'categories' => new CategoryResource($this->whenLoaded('categories')),
            'created_at' => $this->created_at
        ];
    }
}
