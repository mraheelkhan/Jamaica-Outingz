<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::all();

        return view('tours.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tours.create');
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
            Tour::create($request->all());

            DB::commit();

            return redirect::back()->with('success', 'Tour created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect::back()->with('danger', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tour = Tour::where('id', $id)->firstOrfail();
        return view('tours.edit', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tour $tour)
    {
        $request->validate([
            'tour_name' => 'required',
            'location' => 'required',
            'duration' => 'required',
            'cost' => 'required|int',
            'guide_info' => 'required',
        ]);

        $tour->update([
            'tour_name' => $request->tour_name,
            'location' => $request->location,
            'duration' => $request->duration,
            'cost' => $request->cost,
            'guide_info' => $request->guide_info,
        ]);

        return redirect()->back()->withSuccess('Tour has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('tours.index')->withSuccess('Tour has been deleted.');
    }
}
