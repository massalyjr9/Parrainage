<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Notifications\AuthCodeNotification;

class LoginController extends Controller
{
    public function sendAuthCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $auth_code = rand(100000, 999999);
            $user->auth_code = $auth_code;
            $user->save();

            $user->notify(new AuthCodeNotification($auth_code));

            return redirect()->route('verify.auth.code.form')->with('success', 'A verification code has been sent to your email.');
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function verifyAuthCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'auth_code' => 'required|numeric',
        ]);

        $user = User::where('email', $request->email)
                    ->where('auth_code', $request->auth_code)
                    ->first();

        if ($user) {
            Auth::login($user);
            $user->auth_code = null;
            $user->save();

            return redirect()->intended('/profil');
        }

        return back()->withErrors(['auth_code' => 'Invalid authentication code.']);
    }
}