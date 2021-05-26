<?php

namespace App\Http\Controllers;

use App\Models\ScheduleBooking;
use Illuminate\Http\Request;

class ScheduleBookingController extends Controller
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
        return view('schedules.index', compact('array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('schedules.create');
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
     * @param  \App\Models\ScheduleBooking  $scheduleBooking
     * @return \Illuminate\Http\Response
     */
    public function show(ScheduleBooking $scheduleBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScheduleBooking  $scheduleBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(ScheduleBooking $scheduleBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScheduleBooking  $scheduleBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScheduleBooking $scheduleBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScheduleBooking  $scheduleBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScheduleBooking $scheduleBooking)
    {
        //
    }
}
