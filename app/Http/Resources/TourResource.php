<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TourResource extends JsonResource
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
            'tour_image' => 'https://www.funtoursjamaica.com/images/custom_img/slider/2.jpg',
            'tour_name' => $this->tour_name,
            'tour_location' => $this->location,
            'cost' => $this->cost,
            'duration' => $this->duration,
            'guide_info' => $this->guide_info,
            'tour_background_image' => 'https://www.funtoursjamaica.com/images/custom_img/slider/2.jpg',
            'tour_images_list' => [
                'image_1' => 'https://www.funtoursjamaica.com/images/custom_img/slider/3.jpg',
                'image_2' => 'https://www.funtoursjamaica.com/images/custom_img/slider/4.jpg',
                'image_3' => 'https://www.funtoursjamaica.com/images/custom_img/slider/2.jpg',
            ],
        ];
    }
}
