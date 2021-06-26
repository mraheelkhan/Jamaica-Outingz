<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Http\Resources\RestaurantResourceCollection;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return new RestaurantResourceCollection($restaurants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant['image'] = "https://www.funtoursjamaica.com/images/custom_img/slider/2.jpg";
        $restaurant['reviews'] = [
            [
                'stars' => 3,
                'description' => 'the restaurant is awesome',
                'title' => 'nice restaurant',
                'images_list' => [
                    'image_1' => 'https://www.funtoursjamaica.com/images/custom_img/slider/3.jpg',
                    'image_2' => 'https://www.funtoursjamaica.com/images/custom_img/slider/4.jpg',
                ],
            ],
            [
                'stars' => 5,
                'description' => 'the restaurant is awesome and nice',
                'title' => 'great restaurant',
                'images_list' => [
                    'image_1' => 'https://www.funtoursjamaica.com/images/custom_img/slider/3.jpg',
                    'image_2' => 'https://www.funtoursjamaica.com/images/custom_img/slider/4.jpg',
                ],
            ],
        ];


        return response()->json($restaurant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function restaurants($location, $type)
    {
        $restaurants = Restaurant::where('location_id', $location)->where('restaurant_type_id', $type)->get();
        return new RestaurantResourceCollection($restaurants);
    }
}
