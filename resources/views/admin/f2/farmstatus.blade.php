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

                            <h5><i class="fa-solid fa-magnifying-glass-location"></i>&nbsp;Change farm status of
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
                                    <div class="col-md-12">
                                        <div class="">
                                            <label for="farmname" class="col-form-label col-md-2">Farm Name: </label>
                                            <input type="text" id="farmname" class="form-control form-control-sm"
                                                placeholder="" name="farmname" readonly
                                                value="{{ $f2data[0]->farmname }}" />

                                            <input type="hidden" name="owner" id="owner"
                                                value="{{ $f2data[0]->nameofowner }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="">
                                            <label for="farmname" class="col-form-label col-md-2">Farm Status: </label>
                                            {{-- I used the same id c_province for validation  --}}
                                            <select name="farmstatus" id="c_province" class="form-select form-select-sm">
                                                <option value="">[Select Status]</option>
                                                <option value="Active"
                                                    {{ $f2data[0]->farmstatus == 'Active' ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="Inactive"
                                                    {{ $f2data[0]->farmstatus == 'Inactive' ? 'selected' : '' }}>Inactive
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                            <h6 class="text-danger text-center"><strong>NOTE</strong>&nbsp;All the activity under this data area will be affected!</p>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col">
                                        <input type="submit" value="Change Farm Status"
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
