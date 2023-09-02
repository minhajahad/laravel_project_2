<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function provider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackHandle()
    {
        $user = Socialite::driver('google')->user();
        dd($user);
    }
}
