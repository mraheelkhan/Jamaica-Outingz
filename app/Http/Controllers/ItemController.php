<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

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
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|min:2',
            'price' => 'required|int',
            'description' => 'nullable',
            'image' => 'nullable'
        ]);

        Item::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'image' => 'https://www.funtoursjamaica.com/images/custom_img/slider/2.jpg',
        ]);
        return redirect()->back()->withSuccess('Item has successfully created.');
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
            'image' => 'nullable'
        ]);
        $item->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'image' => 'https://www.funtoursjamaica.com/images/custom_img/slider/2.jpg',
        ]);
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
}
