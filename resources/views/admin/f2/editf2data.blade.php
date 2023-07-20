@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">
        @include('_message')
        <form action="{{ route('f2.update',['id'=>$f2data->farmer_id]) }}" method="post" enctype="multipart/form-data" id="editFarmer">
            @csrf

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5><i class="fa-solid fa-magnifying-glass-location"></i>&nbsp;Update Personal Information </h5>
                </div>
                <div class="card-body">
                    <div class="row mb-2 pb-2 rounded-lg bg-gradient-green">
                        <div class="col-md-3">
                            <label for="fishr_nat" class="col-form-label">FishR National</label>
                            <input type="text" id="fishr_nat" class="form-control form-control-sm"
                                placeholder="" name="fishr_nat" value="{{ $f2data->fishr_nat  }}" 
                                {{ $f2data->reg_type == 'Fisherfolk' || $f2data->reg_type == 'All' ? '' : 'readonly'}} />
                            @error('fishr_nat')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="fishr_loc" class="col-form-label">FishR Local</label>
                            <input type="text" id="fishr_loc" class="form-control form-control-sm"
                                placeholder="" name="fishr_loc" value="{{ $f2data->fishr_loc }}" 
                                {{ $f2data->reg_type == 'Fisherfolk' || $f2data->reg_type == 'All' ? '' : 'readonly'}} />
                            @error('fishr_loc')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="rsbsa_nat" class="col-form-label">RSBSA National</label>
                            <input type="text" id="rsbsa_nat" class="form-control form-control-sm"
                                placeholder="" name="rsbsa_nat" value="{{ $f2data->rsbsa_nat }}" 
                                {{ $f2data->reg_type == 'Farmer' || $f2data->reg_type == 'All' ? '' : 'readonly'}} />
                            @error('rsbsa_nat')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="rsbsa_loc" class="col-form-label">RSBSA Local</label>
                            <input type="text" id="rsbsa_loc" class="form-control form-control-sm"
                                placeholder="" name="rsbsa_loc" value="{{ $f2data->rsbsa_loc }}" 
                                {{ $f2data->reg_type == 'Farmer' || $f2data->reg_type == 'All' ? '' : 'readonly'}}/>
                            @error('rsbsa_loc')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-2">
                        <div class="col-md-2">
                            <label for="fname" class="col-form-label">*&nbsp;Category</label>

                            <select name="reg_type" id="reg_type" class="form-select form-select-sm">
                                <option value="">[Select]</option>
                                <option value="Farmer" {{ $f2data->reg_type == 'Farmer' ? 'selected' : '' }}>Farmer</option>
                                <option value="Fisherfolk" {{ $f2data->reg_type == 'Fisherfolk' ? 'selected' : '' }}>
                                    Fisherfolk</option>
                                <option value="All" {{ $f2data->reg_type == 'All' ? 'selected' : '' }}>All</option>
                            </select>
                            @error('reg_type')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="fname" class="col-form-label">*&nbsp;Firstname</label>
                            <input type="text" id="fname" class="form-control form-control-sm"
                                placeholder="Firstname" name="fname" value="{{ $f2data->fname }}" />
                            @error('fname')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="mname" class="col-form-label">Middlename</label>
                            <input type="text" id="mname" class="form-control form-control-sm"
                                placeholder="Middlename" name="mname" value="{{ $f2data->mname }}" />
                        </div>
                        <div class="col-md-3">
                            <label for="lname" class="col-form-label">*&nbsp;Lastname</label>
                            <input type="text" id="lname" class="form-control form-control-sm" placeholder="Lastname"
                                name="lname" value="{{ $f2data->lname }}" />
                            @error('lname')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label for="fname" class="col-form-label">Ext. Name</label>

                            <select name="extname" id="" class="form-select form-select-sm">
                                <option value="[Select]">[Select]</option>
                                <option value="JR" {{ $f2data->extname == 'JR' ? 'selected' : '' }}>JR</option>
                                <option value="SR" {{ $f2data->extname == 'SR' ? 'selected' : '' }}>SR</option>
                                <option value="I" {{ $f2data->extname == 'I' ? 'selected' : '' }}>I</option>
                                <option value="II" {{ $f2data->extname == 'II' ? 'selected' : '' }}>II</option>
                                <option value="III" {{ $f2data->extname == 'III' ? 'selected' : '' }}>III</option>
                                <option value="IV" {{ $f2data->extname == 'IV' ? 'selected' : '' }}>IV</option>
                                <option value="V" {{ $f2data->extname == 'V' ? 'selected' : '' }}>V</option>
                            </select>


                        </div>
                    </div> <!-- END -->
                    <div class="row mb-2">
                        <div class="col-md-2">
                            <label for="dob" class="col-form-label">*&nbsp;Date of Birth</label>
                            <input type="date" id="dob" class="form-control form-control-sm" placeholder=""
                                name="dob" value="{{ $f2data->dob }}" />
                            @error('dob')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="pob" class="col-form-label">*&nbsp;Place of Birth</label>
                            <input type="text" id="pob" class="form-control form-control-sm"
                                placeholder="Ex. Lupon, Davao Oriental" name="pob" value="{{ $f2data->pob }}" />
                            @error('pob')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="gender" class="col-form-label">*&nbsp;Sex</label>

                            <select name="gender" id="" class="form-select form-select-sm">
                                <option value="">[Select]</option>
                                <option value="Male" {{ $f2data->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $f2data->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>

                            @error('gender')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="contactno" class="col-form-label">*&nbsp;Contact #</label>
                            <input type="number" id="contactno" class="form-control form-control-sm"
                                placeholder="Ex. 09102012342" name="contactno" value="{{ $f2data->contactno }}" />
                            @error('contactno')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>

                    </div><!-- END -->
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <label for="contactno" class="col-form-label">*&nbsp;Civil Status</label>
                            <div class="d-flex gap-2 ">
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="cstatus" id="Married"
                                        value="Single" {{ $f2data->cstatus == 'Single' ? 'Checked' : '' }}>
                                    <label class="form-check-label" for="Married">
                                        Single
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="cstatus" id="Married"
                                        value="Married" {{ $f2data->cstatus == 'Married' ? 'Checked' : '' }}>
                                    <label class="form-check-label" for="Married">
                                        Married
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="cstatus" id="Separated"
                                        value="Separated" {{ $f2data->cstatus == 'Separated' ? 'Checked' : '' }}>
                                    <label class="form-check-label" for="Separated">
                                        Separated
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="cstatus" id="Widow/Widower"
                                        value="Widow/Widower" {{ $f2data->cstatus == 'Widow/Widower' ? 'Checked' : '' }}>
                                    <label class="form-check-label" for="Widow/Widower">
                                        Widow/Widower
                                    </label>
                                </div>

                            </div>
                            @error('cstatus')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-1">
                            @if ($f2data->picture)
                                <img src="{{ asset('nawong/farmer/' . $f2data->picture) }}"
                                    class="img-circle elevation-2 border border-white w-100">
                            @else
                                <span>No image found!</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" name="oldPhoto" value="{{$f2data->picture}}" />
                            <label for="picture" class="col-form-label">Upload Image</label>
                            <input type="file" id="picture" class="form-control form-control-sm" placeholder=""
                                name="picture" accept="image/*" />
                        </div>

                    </div>
                </div>
            </div>

            {{-- Start of permanent address card  --}}
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5><i class="fa-solid fa-address-card"></i>&nbsp;Update Current Address </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="c_purok" class="col-form-label">*&nbsp;House/Lot/Bldg. No/Purok</label>
                            <input type="text" id="c_purok" class="form-control form-control-sm"
                                placeholder="Ex. Purok Mauswagon" name="c_purok" value="{{ $f2data->c_purok }}" />
                            @error('c_purok')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="c_street" class="col-form-label">*&nbsp;Stree/Sitio/Subdv.</label>
                            <input type="text" id="c_street" class="form-control form-control-sm"
                                placeholder="Ex. Rizal St." name="c_street" value={{ $f2data->c_street }} />
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
                                    <option value="{{ $regionData->regCode }}"
                                        {{ $f2data->c_region == $regionData->regCode ? 'selected' : '' }}>
                                        {{ $regionData->regDesc }}</option>
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
                                @foreach ($province as $provinceData)
                                    <option value="{{ $provinceData->provCode }}"
                                        {{ $f2data->c_province == $provinceData->provCode ? 'selected' : '' }}>
                                        {{ $provinceData->provDesc }}</option>
                                @endforeach

                            </select>
                            @error('c_province')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="c_citymun" class="col-form-label">*&nbsp;City/Municipality</label>
                            <select name="c_citymun" id="c_citymun" class="form-select form-select-sm">
                                <option value="">[Select City]</option>
                                @foreach ($citymun as $citymunData)
                                    <option value="{{ $citymunData->citymunCode }}"
                                        {{ $f2data->c_citymun == $citymunData->citymunCode ? 'selected' : '' }}>
                                        {{ $citymunData->citymunDesc }}</option>
                                @endforeach
                            </select>
                            @error('c_citymun')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="c_barangay" class="col-form-label">*&nbsp;Barangay</label>
                            <select name="c_barangay" id="c_barangay" class="form-select form-select-sm">
                                <option value="">[Select Barangay]</option>
                                @foreach ($barangay as $barangayData)
                                    <option value="{{ $barangayData->brgyCode }}"
                                        {{ $f2data->c_barangay == $barangayData->brgyCode ? 'selected' : '' }}>
                                        {{ $barangayData->brgyDesc }}</option>
                                @endforeach
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
                    <h5><i class="fa-solid fa-address-card"></i>&nbsp;Update Permanent Address </h5>

                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="p_purok" class="col-form-label">*&nbsp;House/Lot/Bldg. No/Purok</label>
                            <input type="text" id="p_purok" class="form-control form-control-sm"
                                placeholder="Ex. Purok Mauswagon" name="p_purok" value="{{ $f2data->p_purok }}" />
                            @error('p_purok')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="p_street" class="col-form-label">*&nbsp;Stree/Sitio/Subdv.</label>
                            <input type="text" id="p_street" class="form-control form-control-sm"
                                placeholder="Ex. Rizal St." name="p_street" value={{ $f2data->p_street }} />
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
                                    <option value="{{ $regionData->regCode }}"
                                        {{ $f2data->p_region == $regionData->regCode ? 'selected' : '' }}>
                                        {{ $regionData->regDesc }}</option>
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

                                @foreach ($province as $provinceData)
                                    <option value="{{ $provinceData->provCode }}"
                                        {{ $f2data->p_province == $provinceData->provCode ? 'selected' : '' }}>
                                        {{ $provinceData->provDesc }}</option>
                                @endforeach
                            </select>
                            @error('p_province')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="p_citymun" class="col-form-label">*&nbsp;City/Municipality</label>
                            <select name="p_citymun" id="p_citymun" class="form-select form-select-sm">
                                <option value="">[Select City]</option>
                                @foreach ($citymun as $citymunData)
                                    <option value="{{ $citymunData->citymunCode }}"
                                        {{ $f2data->p_citymun == $citymunData->citymunCode ? 'selected' : '' }}>
                                        {{ $citymunData->citymunDesc }}</option>
                                @endforeach
                            </select>
                            @error('p_citymun')
                                <i class="text-red"><strong>{{ $message }}</strong></i>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="p_barangay" class="col-form-label">*&nbsp;Barangay</label>
                            <select name="p_barangay" id="p_barangay" class="form-select form-select-sm">
                                <option value="">[Select Barangay]</option>
                                @foreach ($barangay as $barangayData)
                                    <option value="{{ $barangayData->brgyCode }}"
                                        {{ $f2data->p_barangay == $barangayData->brgyCode ? 'selected' : '' }}>
                                        {{ $barangayData->brgyDesc }}</option>
                                @endforeach
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
                    <input type="submit" id="save" class="btn bg-warning float-right" value="Update Farmer Data"
                        name="submit" />
                </div>
            </div>

        </form>
    </div>
@endsection
