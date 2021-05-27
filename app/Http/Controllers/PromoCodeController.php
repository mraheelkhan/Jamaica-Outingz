<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = PromoCode::all();
        return view('promo-codes.index', compact('array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promo-codes.create');
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
            'customer_id' => 'required|min:4',
            'promo_code' => 'required|min:2',
            'discount' => 'required',
            'guest_name' => 'required'
        ]);

        PromoCode::create($request->all());
        return redirect()->back()->withSuccess('Promo code has successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function show(PromoCode $promoCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function edit(PromoCode $promoCode)
    {
        return view('promo-codes.edit', compact('promoCode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PromoCode $promoCode)
    {
        $request->validate([
            'customer_id' => 'required|min:4',
            'promo_code' => 'required|min:2',
            'discount' => 'required',
            'guest_name' => 'required'
        ]);
        $promoCode->update([
            'customer_id' => $request->customer_id,
            'promo_code' => $request->promo_code,
            'discount' => $request->discount,
            'guest_name' => $request->guest_name,
        ]);
        return redirect()->back()->withSuccess('Promo code has successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(PromoCode $promoCode)
    {
        $promoCode->delete();
        return redirect()->route('promo-codes.index')->withSuccess('Promo code has been deleted.');
    }
}
