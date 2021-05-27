<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = Guide::all();
        return view('guides.index', compact('array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('guides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:4',
            'last_name' => 'required|min:2',
            'email' => 'required',
            'contact' => 'required',
            'pickup_at_hotel_name' => 'required',
            'pickup_at_hotel_address' => 'required',
            'hotel_room' => 'required',
            'name_of_cruiseline' => 'required',
        ]);

        Guide::create($request->all());
        return redirect()->back()->withSuccess('Tour guide has successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guide = Guide::where('id', $id)->firstOrfail();
        return view('guides.edit', compact('guide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guide = Guide::where('id', $id)->firstOrFail();
        $request->validate([
            'first_name' => 'required|min:4',
            'last_name' => 'required|min:2',
            'email' => 'required',
            'contact' => 'required',
            'pickup_at_hotel_name' => 'required',
            'pickup_at_hotel_address' => 'required',
            'hotel_room' => 'required',
            'name_of_cruiseline' => 'required',
        ]);

        Guide::where('id', $id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'pickup_at_hotel_name' => $request->pickup_at_hotel_name,
            'pickup_at_hotel_address' => $request->pickup_at_hotel_address,
            'hotel_room' => $request->hotel_room,
            'name_of_cruiseline' => $request->name_of_cruiseline,
        ]);
        return redirect()->back()->withSuccess('Tour guide has successfully created.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guide = Guide::where('id', $id)->firstOrFail();
        Guide::where('id', $id)->delete();
        return redirect()->route('tour-guides.index')->withSuccess('Tour Guide has been deleted.');
    }
}
