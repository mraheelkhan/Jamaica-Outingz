<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'sku' => $this->sku,
            'title' => $this->title,
            'price' => $this->price,
            'sizes' => $this->sizes,
            'materials' => $this->materials,
            'colors' => $this->colors,
            'fittings' => $this->fittings,
            'description' => $this->description,
            'image' => asset('images/items/' . $this->image),
        ];
    }
}
