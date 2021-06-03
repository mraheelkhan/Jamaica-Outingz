<?php

namespace App\Http\Controllers\API;

use DB;
use App\Http\Controllers\Controller;
use App\Models\Favourite;
use App\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Resources\FavouriteResource;
use App\Http\Resources\FavouriteResourceCollection;
use Validator;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favourites = Favourite::where('user_id', auth()->user()->id)->pluck('tour_id');
        $tours = Tour::find($favourites);
        return FavouriteResource::collection($tours);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|int',
            'tour_id' => 'required|int',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        DB::beginTransaction();
        try {
            $fav = Favourite::create($request->all());

            DB::commit();

            return $fav;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $favourite = Favourite::find($id);
        return response()->json($favourite);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $favourite = Favourite::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|int',
            'tour_id' => 'required|int',
        ]);  

        if ($validator->fails()) {
            return $validator->errors();
        }


        DB::beginTransaction();
        try {
            $fav = Favourite::where('id', $id)->update([
                'user_id' => $request->user_id,
                'tour_id' => $request->tour_id,
            ]);

            DB::commit();

            return $fav;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favourite = Favourite::findOrFail($id);
        
        DB::beginTransaction();
        try {
            Favourite::where('id', $id)->delete();

            DB::commit();

            return [
                'success' => 1, 
                'message' => 'Record has been deleted.' 
            ];
        } catch (\Exception $e) {
            DB::rollback();
            return [
                'success' => 0, 
                'message' => 'Record could not deleted.' 
            ];
        }
    }
}