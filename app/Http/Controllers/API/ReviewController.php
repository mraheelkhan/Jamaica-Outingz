<?php

namespace App\Http\Controllers\API;

use DB;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Resources\ReviewResource;
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
        return new ReviewResource($reviews);
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
            return false;
        }
        
        DB::beginTransaction();
        try {
            Review::create($request->all());
            
            DB::commit();
            
            return true;
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
        $review = Review::find($id);
        return $review;
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
        $review = Review::find($id);
        if (is_null($review)) {
            return 'not found';
        }
        
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|int',
            'tour_id' => 'required|int',
            'title' => 'required',
            'description' => 'required',
            'stars' => 'required|int',
        ]);
            
        if ($validator->fails()) {
            return false;
        }


        DB::beginTransaction();
        try {
            Review::where('id', $id)->update([
                'user_id' => $request->user_id,
                'tour_id' => $request->tour_id,
                'title' => $request->title,
                'description' => $request->description,
                'stars' => $request->stars,
            ]);

            DB::commit();

            return true;
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
        $review = Review::find($id);
        if (is_null($review)) {
            return 'not found';
        }
        
        DB::beginTransaction();
        try {
            Review::where('id', $id)->delete();

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
