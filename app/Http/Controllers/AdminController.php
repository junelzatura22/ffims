<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\City;
use App\Models\Commodity;
use App\Models\Designation;
use App\Models\Position;
use App\Models\Province;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    //
    public function userList()
    {
        $allUsers = User::showAllUsers();
        $areaIdentifier = "User Management";
        return view('admin.user.list', compact('areaIdentifier', 'allUsers'));
    }


    public function edit(Request $request){

       
        $userData = User::find($request->id);
        $commodityList = Commodity::commodityList(); //did not used
       

        if (!empty($userData)) {
            $areaIdentifier = "User Management | User Profile";
            return view('admin.user.edit', compact('areaIdentifier','userData','commodityList'));
        } else {
            $areaIdentifier = "INVALID DATA SEARCHING";
            return view('layouts.abort', compact('areaIdentifier'));
        }
    }

    public function register()
    {

      
        $province = Province::showRegion();
        $region = Region::showRegion();
        $position = Position::showPosition();
        $citymun = City::showCityMun(Auth::user()->province_assigned);
        $barangay = Barangay::showBarangays(Auth::user()->municipality_assigned);
        $commodityList = Commodity::commodityList(); //did not used
        $areaIdentifier = "User Management | Register";
        return view('admin.user.register', compact('areaIdentifier', 'commodityList',
         'position', 'region','province','citymun','barangay'));
    }



    public function store(Request $request)
    {

     
//      remove functions
//     "password" => "required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|:min:9",

        $request->validate([
            "name" => "required|regex:/^[a-zA-Z ]*$/",
            "lastname" => "required|regex:/^[a-zA-Z ]*$/",
            "email" => "required|email|unique:users",
            "contact" => "required|max:11|min:11",
        
            "role" => "required",
            "position" => "required",
            "assigned_commodity" => "required",
            "assigned_barangay" => "required",
        ]);
        $user = new User();


        $filename = "";

        if ($request->hasFile('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $img = Image::make($file->getRealPath())->resize(300, 300);
            $img->save(public_path('nawong/profile/' . $filename));
        } else {
            $filename = "avatar.png";
        }
        $createdBy = Auth::user()->id;
        $name = strtoupper(trim($request->name));
        $lastname = strtoupper(trim($request->lastname));
        $email = $request->email;
        $role = $request->role;
        $contact = $request->contact;
        $password = $request->password;
        //
        $user->image = $filename;
        $user->name = $name;
        $user->lastname = $lastname;
        $user->email = $email;
        $user->role = $role;
        $user->password = Hash::make('Pa$$w0rd!');//default
        $user->created_by =  $createdBy;
        $user->contact = $contact;
        $user->position = $request->position;
        $user->assigned_commodity = json_encode($request->assigned_commodity);
        $user->region_assigned = ($request->region_assigned);
        $user->province_assigned = ($request->province_assigned);
        $user->municipality_assigned = ($request->city_assigned);
        $user->assigned_barangay = json_encode($request->assigned_barangay);
        $user->save();
        return redirect('admin/user/list')->with('success', $name . ' was successfully added!');
    }
}
