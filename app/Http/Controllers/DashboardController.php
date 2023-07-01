<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        if (Auth::user()->role == "Admin") {
            $data = "FFIMS | Admin Dashboard";
        
            return view('admin.dashboard', compact('data'));
        } else if (Auth::user()->role == "Technician") {
            $data = "FFIMS | Technician Dashboard";
            return view('technician.dashboard', compact('data'));
        } else {
            $data = "FFIMS | Farmer Dashboard";
            return view('farmer.dashboard', compact('data'));
        }
    }
}
