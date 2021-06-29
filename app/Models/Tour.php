<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function images() {
        return $this->hasMany('App\Models\TourImage', 'tour_id')->select('image');
    }

}
