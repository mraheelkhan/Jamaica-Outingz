<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pickup;
use App\Http\Resources\PickupResource;
use Validator;
class PickupController extends Controller
{
    public function index()
    {
        $pickups = Pickup::where('user_id', auth()->user()->id)->get();
        return PickupResource::collection($pickups);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'hotel_name' => 'required',
            'hotel_address' => 'required',
            'destination' => 'required',
            'booking_date' => 'required',
            'pickup_date' => 'required',
            'pickup_time' => 'required',
            'adults' => 'required',
            'childrens' => 'required',

        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $validated = $validator->validated();
        $validated['user_id'] = auth()->user()->id;
        
        $pickup = Pickup::create($validated);
        return [
            'success' => 1,
            'pickup' => $pickup->id,
        ];
    }

    public function destroy(Pickup $pickup)
    {
        $pickup->delete();
        return [
            'success' => 1, 
            'message' => 'Pickup record has been deleted.' 
        ];
    }
}
