<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        
        $help = new Contact;
        $help->name = $request->name;
        $help->email = $request->email;
        $help->phone = $request->phone;
        $help->message = $request->message;
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
