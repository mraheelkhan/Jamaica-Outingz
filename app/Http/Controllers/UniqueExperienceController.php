<?php

namespace App\Http\Controllers;

use App\Models\UniqueExperience;
use Illuminate\Http\Request;

class UniqueExperienceController extends Controller
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
        return view('unique-experiences.index', compact('array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unique-experiences.create');
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
     * @param  \App\Models\UniqueExperience  $uniqueExperience
     * @return \Illuminate\Http\Response
     */
    public function show(UniqueExperience $uniqueExperience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UniqueExperience  $uniqueExperience
     * @return \Illuminate\Http\Response
     */
    public function edit(UniqueExperience $uniqueExperience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UniqueExperience  $uniqueExperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UniqueExperience $uniqueExperience)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UniqueExperience  $uniqueExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(UniqueExperience $uniqueExperience)
    {
        //
    }
}
