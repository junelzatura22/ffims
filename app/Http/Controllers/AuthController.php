<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function getData(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'email' => 'required|email',
        ]);

        $password = Hash::make($request->password);
        $email = $request->email;

        $credentials = ['email' => $email, 'password' => $password];
        $remember_token = $request->remember_token;

        if (Auth::attempt($credentials, $remember_token)) {
            return redirect('/')->with('success', 'Isord!');
        } else {
            return redirect('/')->with('error', 'Invalid Username/Password!');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
