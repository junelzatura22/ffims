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
                    <p class="text-muted text-center">Software Engineer</p>
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
                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="card">
                    <div class="card-header p-4">
                        <h5 class="text-green"><i class="fa-solid fa-building-wheat">
                            </i><strong> Assigned Commodity/Program</strong></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                           
                            <form action="{{route('save.user.assignment')}}" method="post">
                               @csrf
                                @foreach ($commodityList as $item)
                                  
                                        <div class="form-check form-switch ml-lg-4">
                                            <input class="form-check-input" type="checkbox" name="commodity[]"
                                                id="flexSwitchCheckChecked" value="{{$item->com_id }}">
                                            <label class="form-check-label"
                                                for="flexSwitchCheckChecked">{{ $item->com_name }}</label>
                                        </div>
                                  
                                @endforeach
                                <div class="float-left mt-1">
                                    <input type="submit" value="Save" class="form-control btn btn-success">
                                </div>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-header p-4">
                        <h5 class="text-green"><i class="fa-solid fa-users"></i>
                            </i><strong> Assigned Position/Designation</strong></h5>
                    </div>
                    <div class="card-body bg-white">
                        Sample
                    </div>
                    <div class="card-footer"> </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-header p-4">
                        <h5 class="text-green"><i class="fa-solid fa-magnifying-glass-location"></i>
                            </i><strong> Assigned Barangay</strong></h5>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
