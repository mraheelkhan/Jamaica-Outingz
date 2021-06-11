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
            'category' => $this->category,
            'restaurant_name' => $this->name,
            'guide_info' => $this->guide_info,
            'image' => 'https://www.funtoursjamaica.com/images/custom_img/slider/2.jpg',
            'reviews' => [
                [
                    'stars' => 3,
                    'description' => 'the restaurant is awesome',
                    'title' => 'nice restaurant',
                    'images_list' => [
                        'image_1' => 'https://www.funtoursjamaica.com/images/custom_img/slider/3.jpg',
                        'image_2' => 'https://www.funtoursjamaica.com/images/custom_img/slider/4.jpg',
                    ],
                ],
                [
                    'stars' => 5,
                    'description' => 'the restaurant is awesome and nice',
                    'title' => 'great restaurant',
                    'images_list' => [
                        'image_1' => 'https://www.funtoursjamaica.com/images/custom_img/slider/3.jpg',
                        'image_2' => 'https://www.funtoursjamaica.com/images/custom_img/slider/4.jpg',
                    ],
                ],
            ],
        ];
    }
}
