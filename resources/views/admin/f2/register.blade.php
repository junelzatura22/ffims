@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">
        {{-- <form action="{{ route('f2.save') }}" method="post" enctype="multipart/form-data" id="registerFarmer"> --}}
        <form action="{{ route('f2.save') }}" method="post" enctype="multipart/form-data" id="registerFarmer">
            @csrf
            {{-- start of the form  --}}
            {{-- start of personal information card  --}}
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5><i class="fa-solid fa-magnifying-glass-location"></i>&nbsp;Personal Information </h5>
                </div>
                <div class="card-body">


                    <div class="row mb-2">
                        <div class="col-md-2">
                            <label for="fname" class="col-form-label">*&nbsp;Category</label>

                            <select name="reg_type" id="reg_type" class="form-select form-select-sm">
                                <option value="">[Select]</option>
                                <option value="Farmer" {{ old('reg_type') == "Farmer" ? "selected" : ""}}>Farmer</option>
                                <option value="Fisherfolk" {{ old('reg_type') == "Fisherfolk" ? "selected" : ""}}>Fisherfolk</option>
                                <option value="All" {{ old('reg_type') == "All" ? "selected" : ""}}>All</option>
                            </select>
                            @error('reg_type')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="fname" class="col-form-label">*&nbsp;Firstname</label>
                            <input type="text" id="fname" class="form-control form-control-sm"
                                placeholder="Firstname" name="fname" />
                            @error('fname')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="mname" class="col-form-label">Middlename</label>
                            <input type="text" id="mname" class="form-control form-control-sm"
                                placeholder="Middlename" name="mname" />
                        </div>
                        <div class="col-md-3">
                            <label for="lname" class="col-form-label">*&nbsp;Lastname</label>
                            <input type="text" id="lname" class="form-control form-control-sm"
                                placeholder="Lastname" name="lname" />
                            @error('lname')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label for="fname" class="col-form-label">Ext. Name</label>

                            <select name="extname" id="" class="form-select form-select-sm">
                                <option value="[Select]">[Select]</option>
                                <option value="JR" {{ old('extname') == "JR" ? "selected" : ""}}>JR</option>
                                <option value="SR" {{ old('extname') == "SR" ? "selected" : ""}}>SR</option>
                                <option value="I" {{ old('extname') == "I" ? "selected" : ""}}>I</option>
                                <option value="II" {{ old('extname') == "II" ? "selected" : ""}}>II</option>
                                <option value="III" {{ old('extname') == "III" ? "selected" : ""}}>III</option>
                                <option value="IV" {{ old('extname') == "IV" ? "selected" : ""}}>IV</option>
                                <option value="V" {{ old('extname') == "V" ? "selected" : ""}}>V</option>
                            </select>


                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-2">
                            <label for="dob" class="col-form-label">*&nbsp;Date of Birth</label>
                            <input type="date" id="dob" class="form-control form-control-sm" placeholder=""
                                name="dob" />
                            @error('dob')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="pob" class="col-form-label">*&nbsp;Place of Birth</label>
                            <input type="text" id="pob" class="form-control form-control-sm"
                                placeholder="Ex. Lupon, Davao Oriental" name="pob" />
                            @error('pob')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="gender" class="col-form-label">*&nbsp;Sex</label>

                            <select name="gender" id="" class="form-select form-select-sm">
                                <option value="">[Select]</option>
                                <option value="Male" {{ old('gender') == "Male" ? "selected" : ""}}>Male</option>
                                <option value="Female" {{ old('gender') == "Female" ? "selected" : ""}}>Female</option>
                            </select>

                            @error('gender')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="contactno" class="col-form-label">*&nbsp;Contact #</label>
                            <input type="number" id="contactno" class="form-control form-control-sm"
                                placeholder="Ex. 09102012342" name="contactno" />
                            @error('contactno')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-2">
                        <div class="col-md-5">
                            <label for="contactno" class="col-form-label">*&nbsp;Civil Status</label>
                            <div class="d-flex gap-2 ">
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="cstatus" id="Married"
                                        value="Single">
                                    <label class="form-check-label" for="Married">
                                        Single
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="cstatus" id="Married"
                                        value="Married">
                                    <label class="form-check-label" for="Married">
                                        Married
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="cstatus" id="Separated"
                                        value="Separated">
                                    <label class="form-check-label" for="Separated">
                                        Separated
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="cstatus" id="Widow/Widower"
                                        value="Widow/Widower">
                                    <label class="form-check-label" for="Widow/Widower">
                                        Widow/Widower
                                    </label>
                                </div>
                                
                            </div>
                            @error('cstatus')
                                    <i class="text-red"><strong>{{ $message }}</strong></i>
                                @enderror
                        </div>
                        <div class="col-md-7">
                            <label for="picture" class="col-form-label">Upload Image</label>
                            <input type="file" id="picture" class="form-control form-control-sm" placeholder=""
                                name="picture" accept="image/*"/>

                        </div>
                    </div>
                </div>
            </div>
            {{-- end of personal information card  --}}
            {{-- Start of permanent address card  --}}
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5><i class="fa-solid fa-address-card"></i>&nbsp;Current Address </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="c_purok" class="col-form-label">*&nbsp;House/Lot/Bldg. No/Purok</label>
                            <input type="text" id="c_purok" class="form-control form-control-sm"
                                placeholder="Ex. Purok Mauswagon" name="c_purok" />
                            @error('c_purok')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="c_street" class="col-form-label">*&nbsp;Stree/Sitio/Subdv.</label>
                            <input type="text" id="c_street" class="form-control form-control-sm"
                                placeholder="Ex. Rizal St." name="c_street" />
                            @error('c_street')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="c_region" class="col-form-label">*&nbsp;Region</label>
                            <select name="c_region" id="c_region" class="form-select form-select-sm">
                                <option value="">[Select Region]</option>
                                @foreach ($region as $regionData)
                                    <option value="{{ $regionData->regCode }}" {{ old('c_region') == $regionData->regCode ? "selected" : ""}}>{{ $regionData->regDesc }}</option>
                                @endforeach
                            </select>
                            @error('c_region')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="c_province" class="col-form-label">*&nbsp;Province</label>
                            <select name="c_province" id="c_province" class="form-select form-select-sm">
                                <option value="">[Select Province]</option>
                            </select>
                            @error('c_province')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="c_citymun" class="col-form-label">*&nbsp;City/Municipality</label>
                            <select name="c_citymun" id="c_citymun" class="form-select form-select-sm">
                                <option value="">[Select City]</option>
                            </select>
                            @error('c_citymun')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="c_barangay" class="col-form-label">*&nbsp;Barangay</label>
                            <select name="c_barangay" id="c_barangay" class="form-select form-select-sm">
                                <option value="">[Select Barangay]</option>
                            </select>
                            @error('c_barangay')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
            {{-- End of permanent address card  --}}
            {{-- Start of temporary address card  --}}
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5><i class="fa-solid fa-address-card"></i>&nbsp;Permanent Address </h5>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="isthesame">
                        <label class="form-check-label" for="flexCheckDefault">
                            Check if the same with Current Address
                        </label>
                    </div>
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="p_purok" class="col-form-label">*&nbsp;House/Lot/Bldg. No/Purok</label>
                            <input type="text" id="p_purok" class="form-control form-control-sm"
                                placeholder="Ex. Purok Mauswagon" name="p_purok" />
                            @error('p_purok')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="p_street" class="col-form-label">*&nbsp;Stree/Sitio/Subdv.</label>
                            <input type="text" id="p_street" class="form-control form-control-sm"
                                placeholder="Ex. Rizal St." name="p_street" />
                            @error('p_street')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="p_region" class="col-form-label">*&nbsp;Region</label>
                            <select name="p_region" id="p_region" class="form-select form-select-sm">
                                <option value="">[Select Region]</option>
                                @foreach ($region as $regionData)
                                    <option value="{{ $regionData->regCode }}" {{ old('p_region') == $regionData->regCode ? "selected" : ""}}>{{ $regionData->regDesc }}</option>
                                @endforeach
                            </select>
                            @error('p_region')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror

                        </div>


                        <div class="col-md-3">
                            <label for="p_province" class="col-form-label">*&nbsp;Province</label>
                            <select name="p_province" id="p_province" class="form-select form-select-sm">
                                <option value="">[Select Province]</option>
                            </select>
                            @error('p_province')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="p_citymun" class="col-form-label">*&nbsp;City/Municipality</label>
                            <select name="p_citymun" id="p_citymun" class="form-select form-select-sm">
                                <option value="">[Select City]</option>
                            </select>
                            @error('p_citymun')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="p_barangay" class="col-form-label">*&nbsp;Barangay</label>
                            <select name="p_barangay" id="p_barangay" class="form-select form-select-sm">
                                <option value="">[Select Barangay]</option>
                            </select>
                            @error('p_barangay')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            {{-- End of temporary address card  --}}
            <div class="row mb-3">
                <div class="col">
                    <input type="submit" id="save" class="btn bg-gradient-green float-right"
                        value="Save Farmer Data" name="submit" />
                </div>
            </div>



            {{-- end  of the form  --}}

        </form>
    </div>
@endsection
