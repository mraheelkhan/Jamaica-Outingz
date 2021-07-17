<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Illuminate\Http\Request;
use Validator;


class HelpController extends Controller
{
    //
    public function help(Request $request)
    {
        // dd($request);
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'phone' => 'required',
        //     'issue' => 'required',
            
        // ]);
        // if ($validator->fails()) {
        //     return $validator->errors();
        // }
        // $validated = $validator->validated();
        // $validated['user_id'] = auth()->user()->id;
        
        // $help = Help::create($validated);
        // return [
        //     'success' => 1,
        //     'help' => $help
        // ];
        $help = new Help;
        $help->name = $request->name;
        $help->email = $request->email;
        $help->phone = $request->phone;
        $help->issue = $request->issue;
        $help->save();
        if($help)
        {
            return ["Results"=>"Data has been saved"];
        }
        else {
            return ["Results"=>"operation failed"];
        }
    }
}
