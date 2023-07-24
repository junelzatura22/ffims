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
                            src="{{ asset('nawong/farmer/' . $f2data->picture) }}" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $f2data->fname }}&nbsp;{{ $f2data->lname }} </h3>

                    @switch($f2data->reg_type)
                        @case('All')
                            <p class="text-muted text-center">Farmer & Fisherfolk</p>
                        @break

                        @case('Farmer')
                            <p class="text-muted text-center">Farmer</p>
                        @break

                        @default
                            <p class="text-muted text-center">Fisherfolk</p>
                    @endswitch


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

                    <a href="{{ route('f2.list') }}" class="btn btn-success btn-block"><b><i
                                class="fa-solid fa-arrow-left"></i> Back to List</b></a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <div class="d-flex justify-content-between align-items-center p-1">
                        <h5><i class="fa-solid fa-magnifying-glass-location"></i>&nbsp;Farm Area</h5>
                        <a href="{{ route('f2.addfarm', ['id' => $f2data->farmer_id]) }}"
                            class="btn bg-gradient-green bi-plus-circle">&nbsp;Add Area</a>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">

                    @foreach ($loadAreas as $farmerArea)
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">

                                    <div class="card-body">
                                        <h5 class="card-title"><strong>Farm Details</strong></h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Farm
                                            Name:&nbsp;<strong>{{ $farmerArea->farmname }}</strong></li>
                                        <li class="list-group-item">Farm
                                            Size:&nbsp;<strong>{{ $farmerArea->farmsize }}</strong></li>
                                        <li class="list-group-item">Farm
                                            Parcel:&nbsp;<strong>{{ $farmerArea->parcel }}</strong></li>
                                        <li class="list-group-item">
                                            Purok:&nbsp;<strong>{{ $farmerArea->c_purok }}</strong></li>
                                        <li class="list-group-item">
                                            Barangay:&nbsp;<strong>{{ $farmerArea->c_barangay }}</strong></li>
                                        <li class="list-group-item">
                                            City/Municipality:&nbsp;<strong>{{ $farmerArea->c_citymun }}</strong></li>
                                        <li class="list-group-item">
                                            Province:&nbsp;<strong>{{ $farmerArea->c_province }}</strong></li>
                                        <li class="list-group-item">
                                            Region:&nbsp;<strong>{{ $farmerArea->c_region }}</strong></li>

                                    </ul>


                                </div>
                            </div>
                            <div class="col-md-8" id="map">
                               

                            </div>
                           
                        </div>
                    @endforeach



                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
