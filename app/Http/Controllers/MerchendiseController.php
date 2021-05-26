<?php

namespace App\Http\Controllers;

use App\Models\Merchendise;
use Illuminate\Http\Request;

class MerchendiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = [
            [
                'tour_name' => 'tour name 1', 
                'location' => 'location 1', 
                'duration' => 'duration 1', 
                'cost' => '$50', 
                'guide_info' => 'lorem ipsum ....'
            ], 
            [
                'tour_name' => 'tour name 1', 
                'location' => 'location 1', 
                'duration' => 'duration 1', 
                'cost' => '$50', 
                'guide_info' => 'lorem ipsum ....'
            ], 
            [
                'tour_name' => 'tour name 1', 
                'location' => 'location 1', 
                'duration' => 'duration 1', 
                'cost' => '$50', 
                'guide_info' => 'lorem ipsum ....'
            ], 
            [
                'tour_name' => 'tour name 1', 
                'location' => 'location 1', 
                'duration' => 'duration 1', 
                'cost' => '$50', 
                'guide_info' => 'lorem ipsum ....'
            ], 
            [
                'tour_name' => 'tour name 1', 
                'location' => 'location 1', 
                'duration' => 'duration 1', 
                'cost' => '$50', 
                'guide_info' => 'lorem ipsum ....'
            ], 
        ];
        return view('merchendises.index', compact('array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchendises.create');
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
     * @param  \App\Models\Merchendise  $merchendise
     * @return \Illuminate\Http\Response
     */
    public function show(Merchendise $merchendise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchendise  $merchendise
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchendise $merchendise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchendise  $merchendise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merchendise $merchendise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchendise  $merchendise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchendise $merchendise)
    {
        //
    }
}
