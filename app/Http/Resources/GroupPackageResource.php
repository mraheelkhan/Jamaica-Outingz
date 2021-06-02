<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupPackageResource extends JsonResource
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
            'tour_name' => $this->tour_name,
            'location_name' => $this->tour_name,
            'information' => "Lorem ipsum sit amet, consectetur adipiscing elit. Quisque viverra elit id mauris aliquam, eu ornare elit elementum. Donec eleifend, diam quis pulvinar hendrer",
            'guide_info' => $this->guide_info,
            'group_background_image' => 'https://www.funtoursjamaica.com/images/custom_img/slider/2.jpg',
            'group_images_list' => [
                'image_1' => 'https://www.funtoursjamaica.com/images/custom_img/slider/3.jpg',
                'image_2' => 'https://www.funtoursjamaica.com/images/custom_img/slider/4.jpg',
                'image_3' => 'https://www.funtoursjamaica.com/images/custom_img/slider/2.jpg',
            ],
        ];
    }
}
