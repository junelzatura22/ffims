@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">

        <!-- /.col -->
        <div class="col">
            {{-- {{ route('f2.storefarm', ['id' => $f2data->farmer_id]) }} --}}
            <form action="" method="post" id="addFarmArea">
                @csrf
                <div class="card">
                    <div class="card-header p-2">
                        <div class="d-flex justify-content-between align-items-center p-1">

                            <h5><i class="fa-solid fa-magnifying-glass-location"></i>&nbsp;Update Farm Area with name of
                                <strong><i>{{ $f2data[0]->farmname }}</i></strong>
                            </h5>
                            <a href="{{ route('f2.activity', ['id' => $f2data[0]->farmer_id]) }}"
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
                                                value="{{ $f2data[0]->farmname }}" />

                                            <input type="hidden" name="owner" id="owner"
                                                value="{{ $f2data[0]->nameofowner }}" />
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
                                                    {{ $f2data[0]->c_region == $regionData->regCode ? 'selected' : '' }}>
                                                    {{ $regionData->regDesc }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="c_province" class="col-form-label">*&nbsp;Province</label>
                                        <select name="c_province" id="c_province" class="form-select form-select-sm">
                                            <option value="">[Select Province]</option>
                                            @foreach ($province as $provinceData)
                                                <option value="{{ $provinceData->provCode }}"
                                                    {{ $f2data[0]->c_province == $provinceData->provCode ? 'selected' : '' }}>
                                                    {{ $provinceData->provDesc }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="c_citymun" class="col-form-label">*&nbsp;City/Municipality</label>
                                        <select name="c_citymun" id="c_citymun" class="form-select form-select-sm">
                                            <option value="">[Select City]</option>
                                            @foreach ($citymun as $citymunData)
                                                <option value="{{ $citymunData->citymunCode }}"
                                                    {{ $f2data[0]->c_citymun == $citymunData->citymunCode ? 'selected' : '' }}>
                                                    {{ $citymunData->citymunDesc }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="c_barangay" class="col-form-label">*&nbsp;Barangay</label>
                                        <select name="c_barangay" id="c_barangay" class="form-select form-select-sm">
                                            <option value="">[Select Barangay]</option>
                                            @foreach ($barangay as $barangayData)
                                            <option value="{{ $barangayData->brgyCode }}"
                                                {{ $f2data[0]->c_barangay == $barangayData->brgyCode ? 'selected' : '' }}>
                                                {{ $barangayData->brgyDesc }}</option>
                                        @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label for="c_purok" class="col-form-label">*&nbsp;Purok</label>
                                        <input type="text" id="c_purok" class="form-control form-control-sm"
                                            placeholder="Ex. Purok Mauswagon" name="c_purok"
                                            value="{{ $f2data[0]->c_purok }}" />

                                    </div>
                                    <div class="col-md-2 ">
                                        <label for="c_street" class="col-form-label">*&nbsp;No. of Parcel</label>
                                        <input type="number" id="parcel" class="form-control form-control-sm"
                                            placeholder="No. of Parcel" name="parcel" value="{{ $f2data[0]->parcel }}" />

                                    </div>
                                    <div class="col-md-2 bg-gradient-green pb-1 rounded-lg">
                                        <label for="farmsize" class="col-form-label">*&nbsp;Farm Size (Hectare)</label>
                                        <input type="number" id="farmsize" class="form-control form-control-sm"
                                            placeholder="Ex. Rizal St." name="farmsize"
                                            value="{{ $f2data[0]->farmsize }}" />

                                    </div>
                                    <div class="col-md-2 ">
                                        <label for="lattitude" class="col-form-label">Lattitude</label>
                                        <input type="number" id="lattitude" class="form-control form-control-sm"
                                            placeholder="Enter Latitude" name="lattitude"
                                            value="{{ $f2data[0]->lattitude }}" />

                                    </div>
                                    <div class="col-md-2 ">
                                        <label for="Longitude" class="col-form-label">Longitude</label>
                                        <input type="number" id="Longitude" class="form-control form-control-sm"
                                            placeholder="Ex. Rizal St." name="Longitude"
                                            value="{{ $f2data[0]->Longitude }}" />

                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label for="ownership" class="col-form-label">*&nbsp;Ownership Type</label>
                                        <select name="ownership" id="ownership" class="form-select form-select-sm">
                                            <option value="">[Select Ownership Type]</option>
                                            <option value="Owner"
                                                {{ $f2data[0]->ownership == 'Owner' ? 'selected' : '' }}>
                                                Owner</option>
                                            <option value="Tenant"
                                                {{ $f2data[0]->ownership == 'Tenant' ? 'selected' : '' }}>Tenant</option>
                                            <option value="Lessee"
                                                {{ $f2data[0]->ownership == 'Lessee' ? 'selected' : '' }}>Lessee</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="nameofowner" class="col-form-label">*&nbsp;Name of
                                            Owner/Tenant/Lessee</label>
                                        @if ($f2data[0]->ownership == 'Owner')
                                            <input type="type" id="nameofowner" class="form-control form-control-sm"
                                                placeholder="" name="nameofowner" readonly
                                                value="{{ $f2data[0]->nameofowner }}" />
                                        @else
                                            <input type="type" id="nameofowner" class="form-control form-control-sm"
                                                placeholder="" name="nameofowner"
                                                value="{{ $f2data[0]->nameofowner }}" />
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <label for="wad" class="col-form-label">*&nbsp;Within Ancestral
                                            Domain</label>
                                        <div class="d-flex gap-2">
                                            @if ($f2data[0]->wad == 'Yes')
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="radio" name="wad"
                                                        id="Married" value="Yes" checked>
                                                    <label class="form-check-label" for="Married">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="radio" name="wad"
                                                        id="Married" value="No">
                                                    <label class="form-check-label" for="Married">
                                                        No
                                                    </label>
                                                </div>
                                            @else
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
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="arb" class="col-form-label">*&nbsp;Agrarian Reform
                                            Beneficiary</label>
                                        <div class="d-flex gap-2">
                                            @if ($f2data[0]->arb == 'Yes')
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="radio" name="arb"
                                                        id="arb" value="Yes" checked>
                                                    <label class="form-check-label" for="Yes">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="radio" name="arb"
                                                        id="arb" value="No">
                                                    <label class="form-check-label" for="No">
                                                        No
                                                    </label>
                                                </div>
                                            @else
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
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-1">
                                    <div class="col">
                                        <input type="submit" value="Update Farm Details"
                                            class="btn btn-warning float-right">
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
