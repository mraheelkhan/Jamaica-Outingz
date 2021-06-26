<?php

namespace App\Http\Controllers;

use App\Models\RestaurantType;
use Illuminate\Http\Request;

class RestaurantTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = RestaurantType::all();
        return view('restaurant-types.index', compact('array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant-types.create');
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
            'name' => 'required|min:4',
        ]);

        RestaurantType::create([
            'name' => $request->name,
        ]);
        return redirect()->back()->withSuccess('Restaurant Type has successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RestaurantType  $type
     * @return \Illuminate\Http\Response
     */
    public function show(RestaurantType $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RestaurantType  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = RestaurantType::where('id', $id)->firstOrFail();
        return view('restaurant-types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RestaurantType  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type = RestaurantType::where('id', $id)->firstOrFail();
        
        $request->validate([
            'name' => 'required|min:4',
        ]);
        $type->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->withSuccess('Restaurant Type has successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RestaurantType  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = RestaurantType::where('id', $id)->firstOrFail();
        RestaurantType::where('id', $id)->delete();
        return redirect()->route('restaurant-types.index')->withSuccess('Restaurant Type has been deleted.');
    }
}
