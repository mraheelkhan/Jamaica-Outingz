<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use App\Models\UniqueExperience;
use Illuminate\Http\Request;

class UniqueExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unique_experiences = UniqueExperience::all();

        return view('unique-experiences.index', compact('unique_experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unique-experiences.create');
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
            'unique_experience_name' => 'required',
            'guide_info' => 'required',
        ]);

        DB::beginTransaction();
        try {
            UniqueExperience::create($request->all());

            DB::commit();

            return redirect::back()->with('success', 'Unique Experience created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect::back()->with('danger', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UniqueExperience  $UniqueExperience
     * @return \Illuminate\Http\Response
     */
    public function show(UniqueExperience $UniqueExperience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UniqueExperience  $UniqueExperience
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unique_experience = UniqueExperience::where('id', $id)->firstOrfail();
        return view('unique-experiences.edit', compact('unique_experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UniqueExperience  $UniqueExperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UniqueExperience $UniqueExperience)
    {
        $request->validate([
            'category' => 'required',
            'unique_experience_name' => 'required',
            'guide_info' => 'required',
        ]);

        $UniqueExperience->update([
            'category' => $request->category,
            'unique_experience_name' => $request->unique_experience_name,
            'guide_info' => $request->guide_info,
        ]);

        return redirect()->back()->withSuccess('Unique Experience has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UniqueExperience  $UniqueExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(UniqueExperience $UniqueExperience)
    {
        $UniqueExperience->delete();
        return redirect()->route('unique-experiences.index')->withSuccess('Unique Experience has been deleted.');
    }
}
