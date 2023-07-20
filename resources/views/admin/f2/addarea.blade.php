@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">

        <!-- /.col -->
        <div class="col">
            <div class="card">
                <div class="card-header p-2">
                    <div class="d-flex justify-content-between align-items-center p-1">

                        <h5><i class="fa-solid fa-magnifying-glass-location"></i>&nbsp;Register Farm Area</h5>
                        <a href="{{ route('f2.activity', ['id' => $f2data->farmer_id]) }}"
                            class="btn bg-gradient-green "><b><i class="fa-solid fa-arrow-left"></i> Back to Activity</b></a>
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
                                        <label for="c_street" class="col-form-label col-md-2">Farm Name: </label>
                                        <input type="text" id="c_street" class="form-control form-control-sm"
                                            placeholder="" name="c_street" readonly value="{{ $f2data->fname }}" />

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
                                    <input type="number" id="c_street" class="form-control form-control-sm"
                                        placeholder="Ex. Rizal St." name="c_street" />

                                </div>
                                <div class="col-md-2 bg-gradient-green pb-1 rounded-lg">
                                    <label for="c_street" class="col-form-label">*&nbsp;Farm Size</label>
                                    <input type="number" id="c_street" class="form-control form-control-sm"
                                        placeholder="Ex. Rizal St." name="c_street" />

                                </div>
                                <div class="col-md-2 ">
                                    <label for="c_street" class="col-form-label">*&nbsp;Lattitude</label>
                                    <input type="number" id="c_street" class="form-control form-control-sm"
                                        placeholder="Ex. Rizal St." name="c_street" />

                                </div>
                                <div class="col-md-2 ">
                                    <label for="c_street" class="col-form-label">*&nbsp;Longitude</label>
                                    <input type="number" id="c_street" class="form-control form-control-sm"
                                        placeholder="Ex. Rizal St." name="c_street" />

                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <label for="c_street" class="col-form-label">*&nbsp;Ownership Type</label>
                                    <select name="c_citymun" id="c_citymun" class="form-select form-select-sm">
                                        <option value="">[Select Ownership Type]</option>
                                        <option value="Owner">Owner</option>
                                        <option value="Tenant">Tenant</option>
                                        <option value="Lessee">Lessee</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="c_street" class="col-form-label">*&nbsp;Name of
                                        Owner/Tenant/Lessee</label>
                                    <input type="type" id="c_street" class="form-control form-control-sm"
                                        placeholder="" name="c_street" />
                                </div>
                                <div class="col-md-2">
                                    <label for="gender" class="col-form-label">*&nbsp;Within Ancestral Domain</label>
                                    <div class="d-flex gap-2">
                                        <div class="form-check-inline">
                                            <input class="form-check-input" type="radio" name="cstatus" id="Married"
                                                value="Yes" >
                                            <label class="form-check-label" for="Married">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <input class="form-check-input" type="radio" name="cstatus" id="Married"
                                                value="No" checked>
                                            <label class="form-check-label" for="Married">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="gender" class="col-form-label">*&nbsp;Agrarian Reform Beneficiary</label>
                                    <div class="d-flex gap-2">
                                        <div class="form-check-inline">
                                            <input class="form-check-input" type="radio" name="arb" id="arb"
                                                value="Yes" >
                                            <label class="form-check-label" for="Yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <input class="form-check-input" type="radio" name="arb" id="arb"
                                                value="No" checked>
                                            <label class="form-check-label" for="No">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
