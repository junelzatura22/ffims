<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function userList(){
        $areaIdentifier = "User Management";
        return view('admin.user.list',compact('areaIdentifier'));
    }
    public function position(){
        
    }


}
