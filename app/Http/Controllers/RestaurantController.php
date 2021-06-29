<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Restaurant;
use App\Models\RestaurantImage;
use Illuminate\Http\Request;
use Redirect;
use Image;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::with('images')->get();

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
            'location_id' => 'required',
            'restaurant_type_id' => 'required',
            'category' => 'required',
            'name' => 'required',
            'guide_info' => 'required',
        ]);

        if ($request->hasFile('images')) {
            $images = $request->images;

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
                $image_resize->save(public_path('/images/restaurants/' . $new));
                
                $image_name = $new;
            }

            $restaurant = Restaurant::create([
                'location_id' => $request->location_id,
                'restaurant_type_id' => $request->restaurant_type_id,
                'category' => $request->category,
                'name' => $request->name,
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
                    $image_resize->save(public_path('/images/restaurants/' . $new));
                    
                    $image_name = $new;
                    RestaurantImage::create([
                        'restaurant_id' => $restaurant->id,
                        'image' => $new,
                    ]);
                }
            }

            DB::commit();

            return redirect::back()->with('success', 'Restaurant created successfully!');
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
            'location_id' => 'required',
            'restaurant_type_id' => 'required',
            'category' => 'required',
            'name' => 'required',
            'guide_info' => 'required',
        ]);

        if ($request->hasFile('images')) {
            $images = $request->images;

            $this->validate($request, [
                'images.*' => 'mimes:jpg,jpeg,png'
            ]);
        }

        $image_name = $restaurant->img;
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
            $image_resize->save(public_path('/images/restaurants/' . $new));
            
            $image_name = $new;
        }

        $restaurant->update([
            'location_id' => $request->location_id,
            'restaurant_type_id' => $request->restaurant_type_id,
            'category' => $request->category,
            'name' => $request->name,
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
                $image_resize->save(public_path('/images/restaurants/' . $new));
                
                $image_name = $new;
                RestaurantImage::create([
                    'restaurant_id' => $restaurant->id,
                    'image' => $new,
                ]);
            }
        }

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

    public function delete_image($id) {
        $image = RestaurantImage::findOrFail($id)->delete();
        return redirect::back()->with('success', 'Image Deleted successfully!');
        // File::delete(public_path("images/filename.png"));

    }
}
