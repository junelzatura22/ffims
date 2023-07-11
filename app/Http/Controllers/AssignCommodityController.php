<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class AssignCommodityController extends Controller
{
    //

    
    public function assignment($id)
    {

        $userData = User::find($id);
        $commodityList = Commodity::commodityList(); //did not used
        

        if (!empty($userData)) {
            $areaIdentifier = "User Management | Technician Assignment";
            return view('admin.user.assignment', compact('areaIdentifier','userData','commodityList'));
        } else {
            $areaIdentifier = "INVALID DATA SEARCHING";
            return view('layouts.abort', compact('areaIdentifier'));
        }
    }
    public function saveAssignment(Request $request)
    {

        dd($request->all());
        // $userData = User::find($id);
        // $commodityList = Commodity::commodityList(); //did not used
        // if (!empty($userData)) {
        //     $areaIdentifier = "User Management | Technician Assignment";
        //     return view('admin.user.assignment', compact('areaIdentifier','userData','commodityList'));
        // } else {
        //     $areaIdentifier = "INVALID DATA SEARCHING";
        //     return view('layouts.abort', compact('areaIdentifier'));
        // }
    }
}
