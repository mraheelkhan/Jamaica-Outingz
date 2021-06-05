<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Http\Resources\BookingResource;
use Illuminate\Http\Request;
use Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::with('tour')->where('user_id', auth()->user()->id)->get();
        return BookingResource::collection($booking);
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
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'hotel_name' => 'required',
            'hotel_address' => 'required',
            'hotel_room' => 'required',
            'booking_date' => 'required',
            'adults' => 'required',
            'childrens' => 'required',
            'tour_id' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $booking = Booking::create($request->all());
        return [
            'success' => 1,
            'booking' => $booking
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'id' => 'required|int',
            'last_name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'hotel_name' => 'required',
            'hotel_address' => 'required',
            'hotel_room' => 'required',
            'booking_date' => 'required',
            'adults' => 'required',
            'childrens' => 'required',
            'tour_id' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $booking = $booking->update($request->all());
        return [
            'success' => 1,
            'booking' => $booking
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return [
            'success' => 1, 
            'message' => 'Booking record has been deleted.' 
        ];
    }
}
