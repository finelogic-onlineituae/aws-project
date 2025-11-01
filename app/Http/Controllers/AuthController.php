<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make([
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails())
        {
            return  response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
           // return response()->json([''])
        }
        
        
    }
}
