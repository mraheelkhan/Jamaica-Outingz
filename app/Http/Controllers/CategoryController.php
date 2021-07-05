<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = Category::all();
        return view('categories.index', compact('array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'image' => 'nullable',
            'description' => 'nullable',
        ]);

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
            $image_resize->save(public_path('/images/categories/' . $new));
            
            $image_name = $new;
        }

        Category::create([
            'name' => $request->name,
            'image' => $image_name,
            'description' => $request->description,
        ]);
        return redirect()->back()->withSuccess('Category has successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:4',
            'image' => 'nullable',
            'description' => 'nullable',
        ]);
        $category->update([
            'name' => $request->name,
            'image' => 'https://www.funtoursjamaica.com/images/custom_img/slider/2.jpg',
            'description' => $request->description,
        ]);
        return redirect()->back()->withSuccess('Category has successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->withSuccess('Category has been deleted.');
    }
}
