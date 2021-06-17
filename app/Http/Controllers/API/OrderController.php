<?php

namespace App\Http\Controllers\API;

use DB;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderShippingDetail;
use Illuminate\Http\Request;
use Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // return json_encode($request->all());
        $validator = Validator::make($request->all(), [
            'item_id' => 'required',
            'category_id' => 'required',
            'size' => 'required',
            'condition' => 'required',
            'material' => 'required',
            'color' => 'required',
            'fitting' => 'required',
            'quantity' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'country' => 'required',
            'zip_postal_code' => 'required',
            'hotel_room_no' => 'required',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $validated = $validator->validated();
        
        // $user_id = auth()->user()->id;
        $user_id = 1;
        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => $user_id,
                'status' => 0,
            ]);

            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $request->input('item_id'),
                'category_id' => $request->input('category_id'),
                'size' => $request->input('size'),
                'condition' => $request->input('condition'),
                'material' => $request->input('material'),
                'color' => $request->input('color'),
                'fitting' => $request->input('fitting'),
                'quantity' => $request->input('quantity'),
            ]);

            OrderShippingDetail::create([
                'order_id' => $order->id,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'country' => $request->input('country'),
                'zip_postal_code' => $request->input('zip_postal_code'),
                'hotel_room_no' => $request->input('hotel_room_no'),
            ]);
            
            $order = json_encode(['user_id' => $user_id, 'status' => 0, 'item' => ['item_id' => $request->input('item_id'), 'category_id' => $request->input('category_id'), 'size' => $request->input('size'), 'condition' => $request->input('condition'), 'material' => $request->input('material'), 'color' => $request->input('color'), 'fitting' => $request->input('fitting'), 'quantity' => $request->input('quantity')], 'shipping' => ['name' => $request->input('name'), 'email' => $request->input('email'), 'address' => $request->input('address'), 'country' => $request->input('country'), 'zip_postal_code' => $request->input('zip_postal_code'), 'hotel_room_no' => $request->input('hotel_room_no'),]]);
            
            DB::commit();
            return [
                'success' => 1,
                'order' => $order
            ];
        }
        catch(\Exception $e) {
            DB::rollback();
            return $e;
            return [
                'success' => 0,
                'order' => null
            ];
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
