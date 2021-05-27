<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use App\Models\GroupPackage;
use Illuminate\Http\Request;

class GroupPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group_packages = GroupPackage::all();

        return view('groups.index', compact('group_packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
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
            'guide_info' => 'required',
        ]);

        DB::beginTransaction();
        try {
            GroupPackage::create($request->all());

            DB::commit();

            return redirect::back()->with('success', 'Group Package created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect::back()->with('danger', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupPackage  $group_package
     * @return \Illuminate\Http\Response
     */
    public function show(GroupPackage $group_package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupPackage  $group_package
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group_package = GroupPackage::where('id', $id)->firstOrfail();
        return view('groups.edit', compact('group_package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroupPackage  $group_package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupPackage $group_package)
    {
        $request->validate([
            'tour_name' => 'required',
            'guide_info' => 'required',
        ]);

        $group_package->update([
            'tour_name' => $request->tour_name,
            'guide_info' => $request->guide_info,
        ]);

        return redirect()->back()->withSuccess('Group Package has been successfully updated.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupPackage  $group_package
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupPackage $group_package)
    {
        $group_package->delete();
        return redirect()->back()->withSuccess('Group Package has been deleted.');
    }
}