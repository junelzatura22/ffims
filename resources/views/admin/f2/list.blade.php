@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">
        <div class="card">
            <div class="card-header">
                <div class="head d-flex justify-content-between">
                    <h5><strong>Total: {{ count($farmerData) }}</strong></h5>
                    <a href="{{ route('f2.register') }}" class="btn bg-gradient-green bi-plus-circle">&nbsp;Add
                        Farmer/Fisherfolk</a>
                </div>
            </div>
            @include('_message')
            <div class="card-body">
                <div class="row" data-masonry='{"percentPosition": true }'>

                    @foreach ($farmerData as $fdata)
                        <div class="col-md-4">
                            <!-- Widget: user widget style 2 -->
                            <div class="card card-widget widget-user-2 shadow-lg">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-gradient-green">
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2 border border-white"
                                            src={{ asset('nawong/farmer/' . $fdata->picture) }} alt="User Avatar">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username">{{ $fdata->fname }}&nbsp;{{ $fdata->lname }}</h3>
                                    <h6 class="widget-user-desc">Category:
                                        {{ $fdata->reg_type == 'All' ? 'Farmer & Fisherfolk' : $fdata->reg_type }}
                                        <br />
                                    </h6>


                                </div>
                                <div class="card-body">
                                    <ul class="nav flex-column">


                                        @switch($fdata->reg_type)
                                            @case('All')
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link text-md">
                                                        {{ $fdata->gender == 'Male' ? 'Mr.' : 'Ms.' }}&nbsp;
                                                        {{ $fdata->lname }}'s&nbsp;Farming Activity
                                                        <span class="float-right badge text-md  bg-info">0</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link text-md">
                                                        {{ $fdata->gender == 'Male' ? 'Mr.' : 'Ms.' }}&nbsp;
                                                        {{ $fdata->lname }}'s&nbsp;Fishery Activity
                                                        <span class="float-right badge text-md  bg-info">0</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link  text-md">
                                                        Insurance Application <span
                                                            class="float-right badge 
                                                    text-md bg-success">0</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link  text-md">
                                                        Production <span class="float-right badge  text-md bg-danger">0</span>
                                                    </a>
                                                </li>
                                            @break

                                            @case('Farmer')
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link text-md">
                                                        {{ $fdata->gender == 'Male' ? 'Mr.' : 'Ms.' }}&nbsp;
                                                        {{ $fdata->lname }}'s&nbsp;Farming Activity
                                                        <span class="float-right badge text-md  bg-info">0</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link  text-md">
                                                        Insurance Application <span
                                                            class="float-right badge 
                                                    text-md bg-success">0</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link  text-md">
                                                        Production <span class="float-right badge  text-md bg-danger">0</span>
                                                    </a>
                                                </li>
                                            @break

                                            @default
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link text-md">
                                                        {{ $fdata->gender == 'Male' ? 'Mr.' : 'Ms.' }}&nbsp;
                                                        {{ $fdata->lname }}'s&nbsp;Fishery Activity
                                                        <span class="float-right badge text-md  bg-info">0</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link  text-md">
                                                        FishR <span
                                                            class="float-right badge 
                                                    text-md bg-success">0</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link  text-md">
                                                        BoatR <span class="float-right badge  text-md bg-danger">0</span>
                                                    </a>
                                                </li>
                                        @endswitch




                                    </ul>
                                </div>
                                <div class="card-footer p-1">

                                    <div class="col d-flex gap-2">
                                        <div class="description-block">
                                            <a href="{{ url('admin/user/list/') }}"><i
                                                    class="fa-solid fa-pen-to-square btn btn-warning shadow"></i></a>
                                        </div>

                                        <div class="description-block">
                                            <a href="{{ url('admin/user/status/') }}" class="btn btn-success">
                                                <i class="fa-solid fa-clipboard-question shadow"></i>&nbsp;Status</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    @endsection
