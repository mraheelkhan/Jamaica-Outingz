<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function images() {
        return $this->hasMany('App\Models\RestaurantImage', 'restaurant_id');
    }

    public function type() {
        return $this->belongsTo('App\Models\RestaurantType', 'restaurant_type_id');
    }
}
