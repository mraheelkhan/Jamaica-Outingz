<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = Guest::all();

        return view('guests.index', compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guests.create');
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
            'guest_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'country' => 'required',
        ]);

        DB::beginTransaction();
        try {
            Guest::create($request->all());

            DB::commit();

            return redirect::back()->with('success', 'Guest created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect::back()->with('danger', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guest = Guest::where('id', $id)->firstOrfail();
        return view('guests.edit', compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guest = Guest::where('id', $id)->firstOrFail();
        $request->validate([
            'guest_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'country' => 'required',
            ]);
            
            Guest::where('id', $id)->update([
            'guest_name' => $request->guest_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            ]);

            return redirect()->back()->withSuccess('Guest has been successfully updated.');
        }
        
        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Guest  $guest
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $guest = Guest::where('id', $id)->firstOrFail();
            Guest::where('id', $id)->delete();
            return redirect()->route('registered-guests.index')->withSuccess('Guest has been deleted.');
        }
}