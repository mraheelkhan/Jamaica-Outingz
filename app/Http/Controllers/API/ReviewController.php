<?php

namespace App\Http\Controllers\API;

use DB;
use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\ReviewResourceCollection;
use Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return new ReviewResourceCollection($reviews);
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
            'title' => 'required',
            'description' => 'required',
            'stars' => 'required|int',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        
        return Review::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Tour::findOrFail($id);
        $reviews = Review::where('tour_id', $review->id)->get();
        return response()->json($reviews);
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
        $review = Review::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|int',
            'tour_id' => 'required|int',
            'title' => 'required',
            'description' => 'required',
            'stars' => 'required|int',
        ]);
            
        if ($validator->fails()) {
            return $validator->errors();
        }


        DB::beginTransaction();
        try {
            $review = Review::where('id', $id)->update([
                'user_id' => $request->user_id,
                'tour_id' => $request->tour_id,
                'title' => $request->title,
                'description' => $request->description,
                'stars' => $request->stars,
            ]);

            DB::commit();

            return $review;
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
        $review = Review::findOrFail($id);
        
        DB::beginTransaction();
        try {
            Review::where('id', $id)->delete();

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
