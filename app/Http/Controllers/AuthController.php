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

        if (!empty(Auth::check())) {
            if (Auth::user()->role == "Admin") {
                return redirect('admin/dashboard');
            } else if (Auth::user()->role == "Technician") {
                return redirect('technician/dashboard');
            } else {
                return redirect('farmer/dashboard');
            }
        }

        return view('auth.login');
    }

    public function getData(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'email' => 'required|email',
        ]);

        $credentials = ['email' => $request->email, 'password' => $request->password];
        $remember_token = $request->remembertoken;

        if (Auth::attempt($credentials, $remember_token)) {
            return redirect('admin/dashboard');
        } else {
            return redirect('/')->with('error', 'Invalid Username/Password!');
        }
    }

    public function logout()
    {
      
        Auth::logout();
        return redirect(url(''));
    }
}
