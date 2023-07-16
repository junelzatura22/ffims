<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Image;

class FarmerFisherfolk extends Controller
{
    //
    public function index()
    {
        $farmerData = Farmer::showAllFarmer();
        $areaIdentifier = "Farmer and Fisherfolk";
        return view('admin.f2.list', compact('areaIdentifier', 'farmerData'));
    }
    public function register()
    {
        $region = Region::showRegion();
        $areaIdentifier = "Farmer and Fisherfolk | Register";
        return view('admin.f2.register', compact('areaIdentifier', 'region'));
    }

    public function save(Request $request)
    {
        $farmer =  new Farmer();
        $filename = "";
        if ($request->hasFile('picture')) {
            $ext = $request->file('picture')->getClientOriginalExtension();
            $file = $request->file('picture');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $img = Image::make($file->getRealPath())->resize(300, 300);
            $img->save(public_path('nawong/farmer/' . $filename));
        } else {
            $filename = "avatar.png";
        }
        $farmer->reg_type = $request->reg_type;
        $farmer->fname = $request->fname;
        $farmer->mname = $request->mname;
        $farmer->lname = $request->lname;
        $farmer->extname = $request->extname;
        $farmer->dob = $request->dob;
        $farmer->pob = $request->pob;
        $farmer->gender = $request->gender;
        $farmer->contactno = $request->contactno;
        $farmer->cstatus = $request->cstatus;
        $farmer->picture = $filename;
        $farmer->c_purok = $request->c_purok;
        $farmer->c_street = $request->c_street;
        $farmer->c_barangay = $request->c_barangay;
        $farmer->c_citymun = $request->c_citymun;
        $farmer->c_province = $request->c_province;
        $farmer->c_region = $request->c_region;
        $farmer->p_purok = $request->p_purok;
        $farmer->p_street = $request->p_street;
        $farmer->p_barangay = $request->p_barangay;
        $farmer->p_citymun = $request->p_citymun;
        $farmer->p_province = $request->p_province;
        $farmer->p_region = $request->p_region;
        $farmer->created_by = Auth::user()->id;
        $farmer->save();
        return redirect('admin/f2/faf')->with('success',"Successfully Added Farmer");
       
    }
}
