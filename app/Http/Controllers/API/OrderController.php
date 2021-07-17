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
        
        $user_id = auth()->user()->id;
        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => $user_id,
                'status' => 0,
                'payment_status' => 'pending',
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
            
            $order = json_encode(['order_id' => $order->id, 'user_id' => $user_id, 'status' => 0, 'payment_status' => 'pending', 'item' => ['item_id' => $request->input('item_id'), 'category_id' => $request->input('category_id'), 'size' => $request->input('size'), 'condition' => $request->input('condition'), 'material' => $request->input('material'), 'color' => $request->input('color'), 'fitting' => $request->input('fitting'), 'quantity' => $request->input('quantity')], 'shipping' => ['name' => $request->input('name'), 'email' => $request->input('email'), 'address' => $request->input('address'), 'country' => $request->input('country'), 'zip_postal_code' => $request->input('zip_postal_code'), 'hotel_room_no' => $request->input('hotel_room_no'),]]);
            
            DB::commit();
            return [
                'success' => 1,
                'order' => $order
            ];
        }
        catch(\Exception $e) {
            DB::rollback();
            return json_encode($e->getMessage());
            return [
                'success' => 0,
                'order' => null
            ];
        }
    }

    public function order_payment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'amount' => 'required',
            'card_cvv' => 'required',
            'card_expiry_date' => 'required',
            'card_number' => 'required',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $validated = $validator->validated();
        
        DB::beginTransaction();
        try {
            $order = Order::where('id', $request->order_id)->first();
            if(is_null($order)) {
                return json_encode('Order not found.');
            }
            if($request->amount < 1) {
                return json_encode('Amount cannot be zero.');
            }

            $amount = sprintf("%012d", $request->amount);
            $card_cvv = $request->card_cvv;
            $card_expiry_date = $request->card_expiry_date;
            $card_number = $request->card_number;

            $payment_status = \App\Core\HelperFunction::payment($amount, $card_cvv, $card_expiry_date, $card_number);

            if($payment_status == 1) {
                $payment_status = 'approved';
            }
            else {
                $payment_status = 'declined';
            }
            $order = Order::where('id', $order->id)->update([
                'payment_status' => $payment_status,
            ]);
            
            DB::commit();
            return [
                'success' => 1,
                'payment_status' => $payment_status
            ];
        }
        catch(\Exception $e) {
            DB::rollback();
            return json_encode($e->getMessage());
            return [
                'success' => 0,
                'payment_status' => null
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
