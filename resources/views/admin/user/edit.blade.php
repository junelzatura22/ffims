@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('nawong/profile/' . $userData->image) }}" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ $userData->name . ' ' . $userData->lastname }}</h3>
                    <p class="text-muted text-center">{{ $p_desc->p_desc}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="float-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="float-right">13,287</a>
                        </li>
                    </ul>
                    <a href="{{ route('userlist') }}" class="btn btn-success btn-block"><b><i
                                class="fa-solid fa-arrow-left"></i> Back to user List</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <form action="{{ route('save.user.assignment') }}" method="post">
                @csrf
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-green"><i class="fa-solid fa-user"></i>
                                </i><strong> Personal Details</strong></h5>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="form-label">* Name</label>
                                    <input type="text" name="name" id="" class="form-control form-control-sm"
                                        placeholder="" aria-describedby="helpId" value="{{ $userData->name }}">
                                    @error('name')
                                        <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">* Last Name</label>
                                    <input type="text" name="lastname" id=""
                                        class="form-control form-control-sm" placeholder="" aria-describedby="helpId"
                                        value="{{ $userData->lastname }}">
                                    @error('lastname')
                                        <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">* Email</label>
                                    <input type="text" name="email" id="" class="form-control form-control-sm"
                                        placeholder="" aria-describedby="helpId" value="{{ $userData->email }}">
                                    @error('email')
                                        <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="form-label">* Contact</label>
                                    <input type="text" name="contact" id="" class="form-control form-control-sm"
                                        placeholder="" aria-describedby="helpId" value="{{ $userData->contact }}">
                                    @error('contact')
                                        <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">* Role</label>
                                    <select name="role" id="" class="form-control form-control-sm">
                                        <option value="">Select</option>

                                        @switch($userData->role=="Technician")
                                            @case(1)
                                                <option value="Technician" {{ $userData->role == 'Technician' ? 'selected' : '' }}>
                                                    Technician</option>
                                            @break

                                            @default
                                                <option value="Admin" {{ $userData->role == 'Admin' ? 'selected' : '' }}>Admin
                                                </option>
                                                <option value="Technician" {{ $userData->role == 'Technician' ? 'selected' : '' }}>
                                                    Technician</option>
                                                <option value="Farmer" {{ $userData->role == 'Farmer' ? 'selected' : '' }}>Farmer
                                                </option>
                                        @endswitch
                                    </select>
                                    @error('role')
                                        <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">* Position</label>
                                    <select name="position" class="form-control form-control-sm">
                                        <option value="">Select Position</option>
                                        @foreach ($position as $positionItem)
                                            <option value="{{ $positionItem->p_id }}"
                                                {{ $userData->position == $positionItem->p_id ? 'selected' : '' }}>
                                                {{ $positionItem->p_desc }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('position')
                                        <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                    @enderror
                                </div>

                            </div>


                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-green"><i class="fa-solid fa-building-wheat">
                                </i><strong> Assigned Commodity/Program</strong></h5>
                        </div>
                        <div class="card-body">

                            @php
                                $dataArray = json_decode($userData->assigned_commodity);
                            @endphp

                            {{-- @foreach ($dataArray as $assignment)
                            {{ $assignment }}
                        @endforeach --}}

                            <div class="row">
                                @foreach ($commodityList as $item)
                                    <div class="form-group  col-md-4">
                                        <div class="form-check form-switch ml-lg-4">
                                            <input class="form-check-input" type="checkbox" name="commodity[]"
                                                id="flexSwitchCheckChecked" value="{{ $item->com_id }}"
                                                {{ in_array($item->com_name, $dataArray) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="flexSwitchCheckChecked">{{ $item->com_name }}</label>
                                        </div>
                                    </div>
                                @endforeach

                            </div>






                        </div>
                    </div>



                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-green"><i class="fa-solid fa-user"></i>
                                </i><strong> Assigned Barangay</strong></h5>
                        </div>
                        @php
                            $barData = json_decode($userData->assigned_barangay);
                        @endphp

                        <div class="card-body">
                            <div class="row" id="barangay-list">
                                @foreach ($barangay as $item)
                                    <div class="form-group col-md-3">
                                        <div class="form-check form-switch ml-lg-4">
                                            <input class="form-check-input" type="checkbox" name="assigned_barangay[]"
                                                id="flexSwitchCheckChecked" value='{{ $item->brgyCode }}'
                                                {{ in_array($item->brgyCode, $barData) ? ' checked' : '' }} />
                                            <label class="form-check-label" for="flexSwitchCheckChecked">
                                                {{ $item->brgyDesc }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="float-left mt-1">
                                <input type="submit" value="Save Changes" class="form-control btn btn-success">
                            </div>
                        </div>


                    </div>

                </div>


            </form>
        </div>

    </div>
    </div>
@endsection
