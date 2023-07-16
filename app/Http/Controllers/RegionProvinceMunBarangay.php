<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class RegionProvinceMunBarangay extends Controller
{
    //
  
    public function getProvince($regCode){
        $data['province'] = Province::where('regCode','=',$regCode)->get(['provDesc','provCode']);
        return response()->json($data);
    }
    public function getCityMun($provCode){
        $data['citymun'] = City::where('provCode','=',$provCode)->get(['citymunDesc','citymunCode']);
        return response()->json($data);
    }
    public function getBarangay($citymunCode){
        $data['barangay'] = Barangay::where('citymunCode','=',$citymunCode)->get(['brgyDesc','brgyCode']);
        return response()->json($data);
    }

}
