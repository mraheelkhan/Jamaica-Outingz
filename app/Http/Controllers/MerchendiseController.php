<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
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
        $merchendises = Merchendise::all();

        return view('merchendises.index', compact('merchendises'));
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
        $this->validate($request, [
            'category' => 'required',
            'type' => 'required',
            'cost' => 'required|int',
            'brand' => 'required',
            'sku' => 'required',
            'color' => 'required',
            'available_size' => 'required',
        ]);

        DB::beginTransaction();
        try {
            Merchendise::create($request->all());

            DB::commit();

            return redirect::back()->with('success', 'Merchendise created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect::back()->with('danger', 'Something went wrong!');
        }
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
    public function edit($id)
    {
        $merchendise = Merchendise::where('id', $id)->firstOrfail();
        return view('merchendises.edit', compact('merchendise'));
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
        $request->validate([
            'category' => 'required',
            'type' => 'required',
            'cost' => 'required|int',
            'brand' => 'required',
            'sku' => 'required',
            'color' => 'required',
            'available_size' => 'required',
        ]);

        $merchendise->update([
            'category' => $request->category,
            'type' => $request->type,
            'cost' => $request->cost,
            'brand' => $request->brand,
            'sku' => $request->sku,
            'color' => $request->color,
            'available_size' => $request->available_size,
        ]);

        return redirect()->back()->withSuccess('Merchendise has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchendise  $merchendise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchendise $merchendise)
    {
        $merchendise->delete();
        return redirect()->route('merchendises.index')->withSuccess('Merchendise has been deleted.');
    }
}
