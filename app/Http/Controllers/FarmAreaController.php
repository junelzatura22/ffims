<?php

namespace App\Http\Controllers;

use App\Models\FarmArea;
use App\Models\Farmer;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmAreaController extends Controller
{
    //

    public function activity($id)
    {
        $f2data = Farmer::find($id);
        if (!empty($f2data)) {
            $loadAreas =  FarmArea::loadAreaOf($id);
            $areaIdentifier = "Farmer | Farming Activity";
            return view('admin.f2.activity', compact('areaIdentifier',  'f2data','loadAreas'));
        } else {
            $areaIdentifier = "INVALID DATA SEARCHING";
            return view('layouts.abort', compact('areaIdentifier'));
        }
    }
    public function addfarm($id)
    {
        $f2data = Farmer::find($id);
        $countArea = FarmArea::showFarmAreaOf($id);
       
        if (!empty($f2data)) {
            $region = Region::showRegion();
            $areaIdentifier = "Register Area to " . $f2data->fname . " " . $f2data->lname;
            return view('admin.f2.addarea', compact('areaIdentifier',  'f2data', 'region', 'countArea','totalArea'));
        } else {
            $areaIdentifier = "INVALID DATA SEARCHING";
            return view('layouts.abort', compact('areaIdentifier'));
        }
    }

    public function store(Request $request, $id)
    {
        // the validation handled with jquery 

        $farmarea = new FarmArea();
        $farmarea->farmname = $request->farmname;
        $farmarea->c_region = $request->c_region;
        $farmarea->c_province = $request->c_province;
        $farmarea->c_citymun = $request->c_citymun;
        $farmarea->c_barangay = $request->c_barangay;
        $farmarea->c_purok = ucwords($request->c_purok);
        $farmarea->parcel = $request->parcel;
        $farmarea->farmsize = $request->farmsize;
        $farmarea->lattitude = $request->lattitude;
        $farmarea->Longitude = $request->Longitude;
        $farmarea->ownership = $request->ownership;
        $farmarea->nameofowner = $request->nameofowner;
        $farmarea->wad = $request->wad;
        $farmarea->arb = $request->arb;
        $farmarea->created_by = Auth::user()->id;
        $farmarea->owned_by = $id;
        $farmarea->is_verefied = 1; //Automatic verified when when admin create the entry
        $farmarea->save();
        return redirect('admin/f2/activity/' . $id)->with('success', "Farm Area was successfully added!");
    }
    public function update(Request $request, $fid)
    {
        // $fid means farm id 
        // the validation handled with jquery 
        $farmarea = FarmArea::find($fid);   
        $farmarea->c_region = $request->c_region;
        $farmarea->c_province = $request->c_province;
        $farmarea->c_citymun = $request->c_citymun;
        $farmarea->c_barangay = $request->c_barangay;
        $farmarea->c_purok = $request->c_purok;
        $farmarea->parcel = $request->parcel;
        $farmarea->farmsize = $request->farmsize;
        $farmarea->lattitude = $request->lattitude;
        $farmarea->Longitude = $request->Longitude;
        $farmarea->ownership = $request->ownership;
        $farmarea->nameofowner = $request->nameofowner;
        $farmarea->wad = $request->wad;
        $farmarea->arb = $request->arb;
        $farmarea->created_by = Auth::user()->id;
        $farmarea->touch();
        return redirect('admin/f2/activity/' . $farmarea->owned_by)->with('success', "Farm Area was successfully modified!");
    }
}
