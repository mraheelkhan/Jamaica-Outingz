<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use App\Models\UniqueExperience;
use App\Models\UniqueExperienceImage;
use Illuminate\Http\Request;
use Image;

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
            'title' => 'required',
            'location' => 'required',
            'duration' => 'required',
            'cost' => 'required|int',
            'guide_info' => 'required',
            'stars' => 'required',
            'no_of_reviews' => 'required',
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

                //Get Filename with Extension
                $fileNameWithExt = $img->getClientOriginalName();
                //Get Just File Name
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //Get File Extension
                $extension = $img->getClientOriginalExtension();
                //FileName to Store
                $new = str_replace(" ", "_", $filename) . '_' . time() . rand(1, 100) . '.' . $extension;
                //Upload Image
                $image_resize->save(public_path('/images/unique-experiences/' . $new));
                
                $image_name = $new;
            }

            $unique_experience = UniqueExperience::create([
                'title' => $request->title,
                'location' => $request->location,
                'duration' => $request->duration,
                'cost' => $request->cost,
                'guide_info' => $request->guide_info,
                'stars' => $request->stars,
                'cover_image' => $image_name,
                'no_of_reviews' => $request->no_of_reviews,
            ]);

            if ($request->hasFile('images')) {
                $images = $request->images;
    
                foreach($images as $img) {
                    $this->validate($request, [
                        'img' => 'mimes:jpg,jpeg,png'
                    ]);
    
                    $image_resize = Image::make($img->getRealPath());
    
                    //Get Filename with Extension
                    $fileNameWithExt = $img->getClientOriginalName();
                    //Get Just File Name
                    $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    //Get File Extension
                    $extension = $img->getClientOriginalExtension();
                    //FileName to Store
                    $new = str_replace(" ", "_", $filename) . '_' . time() . rand(1, 100) . '.' . $extension;
                    //Upload Image
                    $image_resize->save(public_path('/images/unique-experiences/' . $new));
                    
                    $image_name = $new;
                    UniqueExperienceImage::create([
                        'unique_experience_id' => $unique_experience->id,
                        'image' => $new,
                    ]);
                }
            }

            DB::commit();

            return redirect::back()->with('success', 'Unique Experience created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect::back()->with('danger', $e->getMessage());
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
        $unique_experience = UniqueExperience::with('images')->where('id', $id)->firstOrfail();
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
        $this->validate($request, [
            'title' => 'required',
            'location' => 'required',
            'duration' => 'required',
            'cost' => 'required|int',
            'guide_info' => 'required',
            'stars' => 'required',
            'no_of_reviews' => 'required',
        ]);

        if ($request->hasFile('images')) {
            $images = $request->images;

            $this->validate($request, [
                'images.*' => 'mimes:jpg,jpeg,png'
            ]);
        }

        $image_name = $UniqueExperience->cover_image;
        if ($request->hasFile('img')) {
            $img = $request->img;
            $this->validate($request, [
                'img' => 'mimes:jpg,jpeg,png'
            ]);

            $image_resize = Image::make($img->getRealPath());

            //Get Filename with Extension
            $fileNameWithExt = $img->getClientOriginalName();
            //Get Just File Name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get File Extension
            $extension = $img->getClientOriginalExtension();
            //FileName to Store
            $new = str_replace(" ", "_", $filename) . '_' . time() . rand(1, 100) . '.' . $extension;
            //Upload Image
            $image_resize->save(public_path('/images/unique-experiences/' . $new));
            
            $image_name = $new;
        }

        $UniqueExperience->update([
            'title' => $request->title,
            'location' => $request->location,
            'duration' => $request->duration,
            'cost' => $request->cost,
            'guide_info' => $request->guide_info,
            'stars' => $request->stars,
            'cover_image' => $image_name,
            'no_of_reviews' => $request->no_of_reviews,
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
                $image_resize->save(public_path('/images/unique-experiences/' . $new));
                
                $image_name = $new;
                UniqueExperienceImage::create([
                    'unique_experience_id' => $UniqueExperience->id,
                    'image' => $new,
                ]);
            }
        }

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

    public function delete_image($id) {
        $image = UniqueExperienceImage::findOrFail($id)->delete();
        return redirect::back()->with('success', 'Image Deleted successfully!');
        // File::delete(public_path("images/filename.png"));

    }
}
