<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Redirect;

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

        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants.create');
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
            'category' => 'required',
            'name' => 'required',
            'guide_info' => 'required',
        ]);

        DB::beginTransaction();
        try {
            Restaurant::create($request->all());

            DB::commit();

            return redirect::back()->with('success', 'Resturant created successfully!');
        }
        catch(\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect::back()->with('danger', 'Something went wrong!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::where('id', $id)->firstOrfail();
        return view('restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'guide_info' => 'required',
        ]);

        $restaurant->update([
            'category' => $request->category,
            'name' => $request->name,
            'guide_info' => $request->guide_info,
        ]);

        return redirect()->back()->withSuccess('Restaurant has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('restaurants.index')->withSuccess('Restaurant has been deleted.');
    }
}
