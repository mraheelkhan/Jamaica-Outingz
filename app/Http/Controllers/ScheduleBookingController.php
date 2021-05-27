<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
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
        $schedules = ScheduleBooking::all();

        return view('schedules.index', compact('schedules'));
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
        $this->validate($request, [
            'tour_name' => 'required',
            'location' => 'required',
            'duration' => 'required',
            'cost' => 'required|int',
            'guide_info' => 'required',
        ]);

        DB::beginTransaction();
        try {
            ScheduleBooking::create($request->all());

            DB::commit();

            return redirect::back()->with('success', 'Schedule Booking created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect::back()->with('danger', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScheduleBooking  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(ScheduleBooking $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScheduleBooking  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = ScheduleBooking::where('id', $id)->firstOrfail();
        return view('schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScheduleBooking  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schedule = ScheduleBooking::where('id', $id)->firstOrFail();
        $request->validate([
            'tour_name' => 'required',
            'location' => 'required',
            'duration' => 'required',
            'cost' => 'required|int',
            'guide_info' => 'required',
        ]);

        ScheduleBooking::where('id', $id)->update([
            'tour_name' => $request->tour_name,
            'location' => $request->location,
            'duration' => $request->duration,
            'cost' => $request->cost,
            'guide_info' => $request->guide_info,
        ]);

        return redirect()->back()->withSuccess('Schedule Booking has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScheduleBooking  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = ScheduleBooking::where('id', $id)->firstOrFail();
        ScheduleBooking::where('id', $id)->delete();
        return redirect()->route('scheduled-bookings.index')->withSuccess('Schedule Booking has been deleted.');
    }
}
