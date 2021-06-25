<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'country_name' => $this->country_name,
            "name" => $this->name,
            "phone" => $this->phone,
            "email" => $this->email,
            "email_verified_at" => $this->email_verified_at,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            'profile_image' => 'https://i.picsum.photos/id/173/300/300.jpg?hmac=sLKRQqyhqQXIpv5NR6LBNdazxQow4wMJwl570A5uwO0',
        ];
    }
}
