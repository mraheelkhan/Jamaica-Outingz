<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniqueExperience extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];

    protected $appends = ['background_image'];
    public function getBackgroundImageAttribute() {
        return asset('images/unique-experiences/'.$this->cover_image);
    }

    public function images() {
        return $this->hasMany('App\Models\UniqueExperienceImage', 'unique_experience_id');
    }
}
