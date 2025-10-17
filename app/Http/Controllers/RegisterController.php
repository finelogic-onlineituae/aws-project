<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\UserRegistered;
use App\Models\User;

class RegisterController extends Controller
{
    public function register()
    {
        $user = new User();
        $user->email = 'vinod@gmail.com';
        UserRegistered::dispatch($user);
    }
}
