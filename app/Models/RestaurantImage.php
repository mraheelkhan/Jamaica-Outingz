<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantImage extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    protected $appends = [
        'image_name'
    ];

    public function getImageNameAttribute(){
        return asset('images/restaurants/' . $this->image);
    }
}
