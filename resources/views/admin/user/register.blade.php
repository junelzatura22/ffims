@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>Register New User</h5>
            </div>
            <div class="card-body">
                {{-- top details  --}}
                <form action="{{ route('store.user') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <h6 class="mb-3"><i class="fa-solid fa-comment text-red"></i> <i>Fields with asterisk(*) is
                                required</i></h6>
                        <div class="card">
                            <div class="card-header">
                                <h5><i class="fa-solid fa-user-gear"></i> Personal Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">* Name</label>
                                        <input type="text" name="name" placeholder="Ex. Jane"
                                            class="form-control form-control-sm" value="{{ old('name') }}">

                                        @error('name')
                                            <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">* Last Name</label>
                                        <input type="text" name="lastname" placeholder="Ex. Dela Cruz"
                                            class="form-control form-control-sm" value="{{ old('lastname') }}">
                                        @error('lastname')
                                            <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">* Email</label>
                                        <input type="email" name="email" placeholder="Ex. a@a.com"
                                            class="form-control form-control-sm" value="{{ old('email') }}">
                                        @error('email')
                                            <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">* Contact Number (11 Digit)</label>
                                        <input type="number" name="contact" placeholder="Ex. 9999999999"
                                            class="form-control form-control-sm" value="{{ old('contact') }}">
                                        @error('contact')
                                            <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">* Password</label>
                                        <input type="password" name="password" placeholder="Ex. 242@1212!aDmin"
                                            class="form-control form-control-sm" value="{{ old('password') }}">
                                        @error('password')
                                            <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">* Role</label>
                                        <select name="role" id="" class="form-control form-control-sm">
                                            <option value="">Select</option>
                                           
                                            <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="Technician" {{ old('role') == 'Technician' ? 'selected' : '' }}>
                                                Technician</option>
                                            <option value="Farmer" {{ old('role') == 'Farmer' ? 'selected' : '' }}>Farmer
                                            </option>
                                        </select>
                                        @error('role')
                                            <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                        @enderror
                                    </div>

                                </div>


                                <div class="row">

                                    <div class="form-group col-md-5">
                                        <label for="">* Position</label>
                                        <select name="position" class="form-control form-control-sm">
                                            <option value="">Select Position</option>
                                            @foreach ($position as $positionItem)
                                                <option value="{{ $positionItem->p_id }}"
                                                    {{ old('position') == $positionItem->p_id ? 'selected' : '' }}>
                                                    {{ $positionItem->p_desc }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('position')
                                            <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-7">
                                        <label for="">Image (Optional)</label>
                                        <input type="file" name="image" id="image"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="" class="text-white">Commodity/Program</label>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h5><i class="fa-solid fa-building-wheat"></i> Assigned Commodity</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($commodityList as $comItem)
                                        <div class="form-group col-3">
                                            <div class="form-check form-switch ml-lg-4">
                                                <input class="form-check-input" type="checkbox" name="assigned_commodity[]"
                                                    id="flexSwitchCheckChecked" value="{{ $comItem->com_name }}"
                                                    {{ is_array(old('assigned_commodity')) && in_array($comItem->com_name, old('assigned_commodity')) ? ' checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="flexSwitchCheckChecked">{{ $comItem->com_name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                    @error('assigned_commodity')
                                        <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h5><i class="fa-solid fa-magnifying-glass-location"></i> Assigned Barangay</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">* Region</label>
                                        <select name="region_assigned" class="form-control form-control-sm"
                                            id="region-list" disabled>
                                            <option value="">Select Region</option>
                                            @foreach ($region as $regionItem)
                                                <option value="{{ $regionItem->regCode }}" {{ Auth::user()->region_assigned == $regionItem->regCode ? 'selected ' : '' }}>{{ $regionItem->regDesc }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('region_assigned')
                                            <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">* Province</label>
                                        <select name="province_assigned" class="form-control form-control-sm"
                                            id="province-list" disabled>
                                            @foreach ($province as $provinceItem)
                                                <option value="{{ $provinceItem->provCode }}" {{ Auth::user()->province_assigned == $provinceItem->provCode ? 'selected ' : '' }}>{{ $provinceItem->provDesc }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('province_assigned')
                                            <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">* City/Municipality</label>
                                        <select name="city_assigned" class="form-control form-control-sm"
                                            id="citymun-list"></select>
                                            @error('city_assigned')
                                            <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                        @enderror
                                    </div>

                                </div>


                                <h6>Below will load the list of barangays</h6>
                                <div class="row" id="barangay-list">


                                    <h5>Barangay List Here!</h5>


                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-1"><input type="submit" name="submit "
                                class="form-control form-control-lg btn btn-success float-right " value="Save"></div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
