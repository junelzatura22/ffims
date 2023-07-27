@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">

        <!-- /.col -->
        <div class="col">
            <form action="" method="post" id="addFarmArea">
                @csrf
                <div class="card">
                    <div class="card-header p-2">
                        <div class="d-flex justify-content-between align-items-center p-1">

                            <h5><i class="fa-solid fa-magnifying-glass-location"></i>&nbsp;Register Farm Area</h5>
                            <a href="{{ route('f2.activity', ['id' => $f2data->farmer_id]) }}"
                                class="btn bg-gradient-green "><b><i class="fa-solid fa-arrow-left"></i> Back to
                                    Activity</b></a>
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body">

                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5><i class="fa-solid fa-address-card"></i>&nbsp;Farm Location</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex align-items-center">
                                            <label for="farmname" class="col-form-label col-md-2">Farm Name: </label>
                                            <input type="text" id="farmname" class="form-control form-control-sm"
                                                placeholder="" name="farmname" readonly
                                                value="{{ $f2data->fname . '_' . $f2data->lname . '' . $countArea->count() + 1 }}" />
                                            @php
                                                $extName =  $f2data->extname;
                                                $fullname = $f2data->fname . ' ' . $f2data->lname. ' '.($extName=="[Select]" ? "" : $extName);
                                            @endphp
                                            <input type="hidden" name="owner" id="owner"
                                                value="{{ $fullname}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="c_region" class="col-form-label">*&nbsp;Region</label>
                                        <select name="c_region" id="c_region" class="form-select form-select-sm">
                                            <option value="">[Select Region]</option>
                                            @foreach ($region as $regionData)
                                                <option value="{{ $regionData->regCode }}"
                                                    {{ old('c_region') == $regionData->regCode ? 'selected' : '' }}>
                                                    {{ $regionData->regDesc }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="c_province" class="col-form-label">*&nbsp;Province</label>
                                        <select name="c_province" id="c_province" class="form-select form-select-sm">
                                            <option value="">[Select Province]</option>
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="c_citymun" class="col-form-label">*&nbsp;City/Municipality</label>
                                        <select name="c_citymun" id="c_citymun" class="form-select form-select-sm">
                                            <option value="">[Select City]</option>
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="c_barangay" class="col-form-label">*&nbsp;Barangay</label>
                                        <select name="c_barangay" id="c_barangay" class="form-select form-select-sm">
                                            <option value="">[Select Barangay]</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label for="c_purok" class="col-form-label">*&nbsp;Purok</label>
                                        <input type="text" id="c_purok" class="form-control form-control-sm"
                                            placeholder="Ex. Purok Mauswagon" name="c_purok" />

                                    </div>
                                    <div class="col-md-2 ">
                                        <label for="c_street" class="col-form-label">*&nbsp;No. of Parcel</label>
                                        <input type="number" id="parcel" class="form-control form-control-sm"
                                            placeholder="No. of Parcel" name="parcel" />

                                    </div>
                                    <div class="col-md-2 bg-gradient-green pb-1 rounded-lg">
                                        <label for="farmsize" class="col-form-label">*&nbsp;Farm Size (Hectare)</label>
                                        <input type="number" id="farmsize" class="form-control form-control-sm"
                                            placeholder="Ex. Rizal St." name="farmsize" />

                                    </div>
                                    <div class="col-md-2 ">
                                        <label for="lattitude" class="col-form-label">Lattitude</label>
                                        <input type="number" id="lattitude" class="form-control form-control-sm"
                                            placeholder="Enter Latitude" name="lattitude" />

                                    </div>
                                    <div class="col-md-2 ">
                                        <label for="Longitude" class="col-form-label">Longitude</label>
                                        <input type="number" id="Longitude" class="form-control form-control-sm"
                                            placeholder="Ex. Rizal St." name="Longitude" />

                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label for="ownership" class="col-form-label">*&nbsp;Ownership Type</label>
                                        <select name="ownership" id="ownership" class="form-select form-select-sm">
                                            <option value="">[Select Ownership Type]</option>
                                            <option value="Owner">Owner</option>
                                            <option value="Tenant">Tenant</option>
                                            <option value="Lessee">Lessee</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="nameofowner" class="col-form-label">*&nbsp;Name of
                                            Owner/Tenant/Lessee</label>
                                        <input type="type" id="nameofowner" class="form-control form-control-sm"
                                            placeholder="" name="nameofowner" />
                                    </div>
                                    <div class="col-md-2">
                                        <label for="wad" class="col-form-label">*&nbsp;Within Ancestral
                                            Domain</label>
                                        <div class="d-flex gap-2">
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="wad"
                                                    id="Married" value="Yes">
                                                <label class="form-check-label" for="Married">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="wad"
                                                    id="Married" value="No" checked>
                                                <label class="form-check-label" for="Married">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="arb" class="col-form-label">*&nbsp;Agrarian Reform
                                            Beneficiary</label>
                                        <div class="d-flex gap-2">
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="arb"
                                                    id="arb" value="Yes">
                                                <label class="form-check-label" for="Yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="arb"
                                                    id="arb" value="No" checked>
                                                <label class="form-check-label" for="No">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-1">
                                    <div class="col">
                                        <input type="submit" value="Save Farm" class="btn btn-success float-right">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div><!-- /.card-body -->
                </div>
            </form>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
