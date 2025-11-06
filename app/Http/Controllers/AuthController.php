<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
            return response()->json([
                'status' => '401',
                'errors' => ['email' => 'Invalid Credentials']
            ], 401);
        }
        $user = Auth::user();
        
        $user->tokens()->delete();

        // Create new token
        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user,
        ], 200);
    }
}
