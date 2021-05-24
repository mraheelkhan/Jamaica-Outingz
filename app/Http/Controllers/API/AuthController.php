<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Validator;
class AuthController extends Controller
{
    public function register(Request $request){
        $validatedData = $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8|string',
            'phone' => 'required|min:8|string|unique:users',
            'country_name' => 'required|min:3|string',
        ]);

        if ($validator->fails()) {
            $response_data=[
                'success' => 0,
                'message' => 'Validation errors',
                'data' => $validator->errors()
            ];
            return response()->json($response_data);
        }

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'country_id' => 0,
            'country_name' => $request['country_name'],
            'password' => Hash::make($request['password']),
        ]);
            
        $token = $user->createToken('auth_token')->plainTextToken;
            
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'token' => 'Bearer ' . $token,
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'token' => 'Bearer ' . $token,
        ]);
    }
}
