<?php

namespace App\Http\Controllers\API;

use DB;
use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Resources\TourResourceCollection;

class SearchController extends Controller
{
    public function search_tours($text) {
        $tours = Tour::where('tour_name', 'like', '%' . $text . '%')->get();
        return new TourResourceCollection($tours);
    }
}
