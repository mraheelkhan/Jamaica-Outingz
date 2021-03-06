<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tour;
class Booking extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function tour(){
        return $this->belongsTo(Tour::class, 'tour_id', 'id')->withDefault();
    }
}
