<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemImage;
use Illuminate\Http\Request;
use Image;
use DB;
use Redirect;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = Item::all();
        return view('items.index', compact('array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'category_id' => 'required',
                'sku' => 'required',
                'title' => 'required|min:2',
                'price' => 'required|int',
                'description' => 'nullable',
                'sizes' => 'required',
                'materials' => 'required',
                'colors' => 'required',
                'fittings' => 'required',
            ]);

            if ($request->hasFile('images')) {
                $images = $request->images;

                $this->validate($request, [
                    'images.*' => 'mimes:jpg,jpeg,png'
                ]);
            }

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
                $image_resize->save(public_path('/images/items/' . $new));
                
                $image_name = $new;
            }

            $item = Item::create([
                'category_id' => $request->category_id,
                'sku' => $request->sku,
                'title' => $request->title,
                'price' => $request->price,
                'description' => $request->description,
                'sizes' => $request->sizes,
                'materials' => $request->materials,
                'colors' => $request->colors,
                'fittings' => $request->fittings,
                'image' => $image_name,
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
                    $image_resize->save(public_path('/images/items/' . $new));
                    
                    $image_name = $new;
                    ItemImage::create([
                        'item_id' => $item->id,
                        'image' => $new,
                    ]);
                }
            }

            DB::commit();
            return redirect()->back()->withSuccess('Item has successfully created.');
        }
        catch(\Exception $e) {
            DB::rollback();
            return redirect()->back()->withDanger($e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|min:2',
            'price' => 'required|int',
            'description' => 'nullable',
        ]);

        if ($request->hasFile('images')) {
            $images = $request->images;

            $this->validate($request, [
                'images.*' => 'mimes:jpg,jpeg,png'
            ]);
        }

        $image_name = $item->img;
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
            $image_resize->save(public_path('/images/items/' . $new));
            
            $image_name = $new;
        }

        $item->update([
            'category_id' => $request->category_id,
            'sku' => $request->sku,
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'sizes' => $request->sizes,
            'materials' => $request->materials,
            'colors' => $request->colors,
            'fittings' => $request->fittings,
            'image' => $image_name,
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
                $image_resize->save(public_path('/images/items/' . $new));
                
                $image_name = $new;
                ItemImage::create([
                    'item_id' => $item->id,
                    'image' => $new,
                ]);
            }
        }
        
        return redirect()->back()->withSuccess('Item has successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->withSuccess('Item has been deleted.');
    }

    public function delete_image($id) {
        $image = ItemImage::findOrFail($id)->delete();
        return redirect::back()->with('success', 'Image Deleted successfully!');
        // File::delete(public_path("images/filename.png"));

    }
}
