<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use App\Models\Tour;
use App\Models\TourImage;
use Illuminate\Http\Request;
use Image;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::with('images')->get();

        return view('tours.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tours.create');
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
            'location' => 'required',
            'duration' => 'required',
            'cost' => 'required|int',
            'guide_info' => 'required',
        ]);
        if ($request->hasFile('images')) {
            $images = $request->images;
            if(count($images) > 5) {
                return redirect::back()->with('danger', 'You cannot upload more than 5 extra images!');
            }

            $this->validate($request, [
                'images.*' => 'mimes:jpg,jpeg,png'
            ]);
        }

        DB::beginTransaction();
        try {
            $image_name = 'default.jpg';
            if ($request->hasFile('img')) {
                $img = $request->img;
                $this->validate($request, [
                    'img' => 'mimes:jpg,jpeg,png'
                ]);

                $image_resize = Image::make($img->getRealPath());
                // $width = Image::make($img)->width();
                // $height = Image::make($img)->height();
                // $division_by = $height / 500;
                // $new_width = $width / $division_by;
                // $image_resize->resize($new_width, 500);

                //Get Filename with Extension
                $fileNameWithExt = $img->getClientOriginalName();
                //Get Just File Name
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //Get File Extension
                $extension = $img->getClientOriginalExtension();
                //FileName to Store
                $new = str_replace(" ", "_", $filename) . '_' . time() . rand(1, 100) . '.' . $extension;
                //Upload Image
                $image_resize->save(public_path('/images/tours/' . $new));
                
                $image_name = $new;
            }

            $tour = Tour::create([
                'tour_name' => $request->tour_name,
                'location' => $request->location,
                'duration' => $request->duration,
                'cost' => $request->cost,
                'guide_info' => $request->guide_info,
                'img' => $image_name,
            ]);

            if ($request->hasFile('images')) {
                $images = $request->images;
    
                foreach($images as $img) {
                    $this->validate($request, [
                        'img' => 'mimes:jpg,jpeg,png'
                    ]);
    
                    $image_resize = Image::make($img->getRealPath());
                    // $width = Image::make($img)->width();
                    // $height = Image::make($img)->height();
                    // $division_by = $height / 500;
                    // $new_width = $width / $division_by;
                    // $image_resize->resize($new_width, 500);
    
                    //Get Filename with Extension
                    $fileNameWithExt = $img->getClientOriginalName();
                    //Get Just File Name
                    $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    //Get File Extension
                    $extension = $img->getClientOriginalExtension();
                    //FileName to Store
                    $new = str_replace(" ", "_", $filename) . '_' . time() . rand(1, 100) . '.' . $extension;
                    //Upload Image
                    $image_resize->save(public_path('/images/tours/' . $new));
                    
                    $image_name = $new;
                    TourImage::create([
                        'tour_id' => $tour->id,
                        'image' => $new,
                    ]);
                }
            }

            DB::commit();

            return redirect::back()->with('success', 'Tour created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect::back()->with('danger', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tour = Tour::where('id', $id)->firstOrfail();
        return view('tours.edit', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tour $tour)
    {
        $request->validate([
            'tour_name' => 'required',
            'location' => 'required',
            'duration' => 'required',
            'cost' => 'required|int',
            'guide_info' => 'required',
        ]);

        $image_name = $tour->img;
        if ($request->hasFile('img')) {
            $img = $request->img;
            $this->validate($request, [
                'img' => 'mimes:jpg,jpeg,png'
            ]);

            $image_resize = Image::make($img->getRealPath());
            // $width = Image::make($img)->width();
            // $height = Image::make($img)->height();
            // $division_by = $height / 500;
            // $new_width = $width / $division_by;
            // $image_resize->resize($new_width, 500);

            //Get Filename with Extension
            $fileNameWithExt = $img->getClientOriginalName();
            //Get Just File Name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get File Extension
            $extension = $img->getClientOriginalExtension();
            //FileName to Store
            $new = str_replace(" ", "_", $filename) . '_' . time() . rand(1, 100) . '.' . $extension;
            //Upload Image
            $image_resize->save(public_path('/images/tours/' . $new));
            
            $image_name = $new;
        }

        $tour->update([
            'tour_name' => $request->tour_name,
            'location' => $request->location,
            'duration' => $request->duration,
            'cost' => $request->cost,
            'guide_info' => $request->guide_info,
            'img' => $image_name,
        ]);

        return redirect()->back()->withSuccess('Tour has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('tours.index')->withSuccess('Tour has been deleted.');
    }
}
