<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
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
            'type' => $this->type,
            'category' => $this->category,
            'restaurant_name' => $this->name,
            'guide_info' => $this->guide_info,
            'image' => asset('images/restaurants/' . $this->img),
            'images_list' => $this->images,
        ];
    }
}
