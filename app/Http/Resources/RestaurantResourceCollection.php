<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RestaurantResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        return [
            'id' => $this->id,
            'category' => $this->category,
            'restaurant_name' => $this->name,
            'guide_info' => $this->guide_info,
            'image' => 'https://www.funtoursjamaica.com/images/custom_img/slider/2.jpg' 
        ];
        return parent::toArray($request);
    }
}
