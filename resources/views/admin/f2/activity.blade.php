@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">
        <div class="col-md-2">

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
        <div class="col-md-10">
            <div class="card">
                <div class="card-header p-2">
                    <div class="d-flex justify-content-between align-items-center p-1">
                        <h5><i class="fa-solid fa-magnifying-glass-location"></i>&nbsp;Farm Area</h5>
                        <a href="{{ route('f2.addfarm', ['id' => $f2data->farmer_id]) }}"
                            class="btn bg-gradient-green bi-plus-circle">&nbsp;Add Area</a>
                    </div>
                </div><!-- /.card-header -->
                @include('_message')
                <div class="card-body">


                    <div class="row">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 50px"
                                            class="bg-gradient-green text-sm font-weight-bold text-center">#</th>
                                        <th>Farm Name</th>
                                        <th>Size</th>
                                        <th>Parcel</th>
                                        <th>Location</th>
                                        <th>Date Created</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($loadAreas as $farmerArea => $item)
                                        @if ($item->farmstatus == 'Active')
                                            <tr id={{ $item->farm_id }}>
                                                <td class="bg-gradient-green text-sm font-weight-bold text-center">
                                                    {{ $farmerArea + 1 }}</td>
                                                <td class="">{{ $item->farmname }}</td>
                                                <td class="">{{ $item->farmsize }}</td>
                                                <td class="">{{ $item->parcel }}</td>
                                                @php
                                                    $location = $item->c_purok . ', ' . $item->c_barangay . ', ' . $item->c_citymun;
                                                @endphp
                                                <td class="">{{ $location }}</td>
                                                <td class="">{{ date('F, d Y h:i A', strtotime($item->created_at)) }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('f2.getFarmData', ['fid' => $item->farm_id]) }}"
                                                        class="btn-warning p-2" id="" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Edit Farm Data">
                                                        <i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('f2.farmStatus', ['fid' => $item->farm_id]) }}" class="btn-primary p-2" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Change Farm status">
                                                        <i class="fa-solid fa-pencil"></i></a>
                                                    <a href="" class="btn-success p-2" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Add Farm Data">
                                                        <i class="fa-solid fa-marker"></i></a>
                                                </td>
                                            </tr>
                                        @else
                                            <tr id={{ $item->farm_id }} class="bg-gray">
                                                <td class="bg-gradient-green text-sm font-weight-bold text-center">
                                                    {{ $farmerArea + 1 }}</td>
                                                <td class="">{{ $item->farmname }}</td>
                                                <td class="">{{ $item->farmsize }}</td>
                                                <td class="">{{ $item->parcel }}</td>
                                                @php
                                                    $location = $item->c_purok . ', ' . $item->c_barangay . ', ' . $item->c_citymun;
                                                @endphp
                                                <td class="">{{ $location }}</td>
                                                <td class="">{{ date('F, d Y h:i A', strtotime($item->created_at)) }}
                                                </td>
                                                <td>

                                                    <a href="{{ route('f2.farmStatus', ['fid' => $item->farm_id]) }}" class="btn-primary p-2" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Change Farm status">
                                                        <i class="fa-solid fa-pencil"></i></a>
                                                    
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
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
