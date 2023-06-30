<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        dd($password);
    }
}
