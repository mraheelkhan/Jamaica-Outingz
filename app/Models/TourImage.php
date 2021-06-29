<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourImage extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $appends = [
        'image_name'
    ];

    public function getImageNameAttribute(){
        return $this->asset('images/tours/' . $this->image);
    }
}
