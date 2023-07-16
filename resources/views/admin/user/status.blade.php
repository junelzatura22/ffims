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
                    <p class="text-muted text-center">{{ $p_desc->p_desc }}</p>
                    {{-- <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="float-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="float-right">13,287</a>
                        </li>
                    </ul> --}}
                    <a href="{{ route('userlist') }}" class="btn btn-success btn-block"><b><i
                                class="fa-solid fa-arrow-left"></i> Back to user List</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @include('_message')
            <form action="" method="post">
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
                                        placeholder="" aria-describedby="helpId" value="{{ $userData->name }}" disabled>
                                    @error('name')
                                        <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">* Last Name</label>
                                    <input type="text" name="lastname" id=""
                                        class="form-control form-control-sm" placeholder="" aria-describedby="helpId"
                                        value="{{ $userData->lastname }}" disabled>
                                    @error('lastname')
                                        <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">* Email</label>
                                    <input type="text" name="email" id="" class="form-control form-control-sm"
                                        placeholder="" aria-describedby="helpId" value="{{ $userData->email }}" disabled>
                                    @error('email')
                                        <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="form-label">* Contact</label>
                                    <input type="text" name="contact" id="" class="form-control form-control-sm"
                                        placeholder="" aria-describedby="helpId" value="{{ $userData->contact }}" disabled>
                                    @error('contact')
                                        <span><i class="text-red"><strong>{{ $message }}</strong></i></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">* Role</label>
                                    <select name="role" id="" class="form-control form-control-sm" disabled>
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
                                    <select name="position" class="form-control form-control-sm" disabled>
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
                            <h5 class="text-green"><i class="fa-solid fa-user-slash"></i>
                                </i><strong>&nbsp;Change user status</strong></h5>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <div class="mb-3 d-flex gap-2 align-items-center ">

                                        <select class="form-select form-select-md" name="status" id="">
                                            <option>Select one</option>

                                            @if ($userData->status == '0')
                                                <option value="0" selected>Active</option>
                                                <option value="1" >Inactive</option>
                                            @else
                                            <option value="0" >Active</option>
                                            <option value="1" selected>Inactive</option>
                                            @endif



                                        </select>


                                        <input type="submit" name="submit" id=""
                                            class="form-control btn btn-success col-2" aria-describedby="helpId"
                                            value="Save Changes">
                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    </div>
@endsection
