<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use App\Models\Guest;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = User::where('user_role', '!=', 'admin')->get();

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
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'country' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        DB::beginTransaction();
        try {
            User::create([
                'name' => $request->input('guest_name'),
                'phone' => $request->input('phone'),
                'country_id' => 1,
                'country_name' => $request->input('country'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            DB::commit();

            return redirect::back()->with('success', 'Guest created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
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
        $guest = User::where('id', $id)->firstOrfail();
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
        $guest = User::where('id', $id)->firstOrFail();

        $request->validate([
            'guest_name' => 'required',
            'email' => 'required|unique:users,email,' . $guest->id . ',id',
            'phone' => 'required|unique:users,phone,' . $guest->id . ',id',
            'country' => 'required',
        ]);

        if (!is_null($request->input('password'))) {
            $this->validate($request, [
                'password' => 'required|min:8|confirmed'
            ]);

            $password = Hash::make($request->input('password'));
        }
        else {
            $password = $guest->password;
        }
            
        User::where('id', $id)->update([
            'name' => $request->guest_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_name' => $request->country,
            'password' => $password,
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
            $guest = User::where('id', $id)->firstOrFail();
            User::where('id', $id)->delete();
            return redirect()->route('registered-guests.index')->withSuccess('Guest has been deleted.');
        }
}