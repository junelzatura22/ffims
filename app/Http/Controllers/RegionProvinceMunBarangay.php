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
       
        // <div class="form-group col-3"><div class="form-check form-switch ml-lg-4">
        // <input class="form-check-input" type="checkbox" name="commodity[]" 
        // id="flexSwitchCheckChecked" value="'.value.brgyCode.'">
        // <label class="form-check-label" for="flexSwitchCheckChecked">"'.value.brgyDesc.'"</label></div></div>

        return response()->json($data);
    }

}
