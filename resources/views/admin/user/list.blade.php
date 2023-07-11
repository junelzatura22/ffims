@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">

    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="font-weight-bold"><span class="text-info">Total User(s):</span> <span
                        class="badge bg-gradient-green text-lg"> {{ $allUsers->count() }}</span></h6>
                <a href="{{ url('admin/user/register') }}" class="btn bg-gradient-green bi-plus-circle me-2"> Add New User</a>

            </div>
        </div>
        <div class="card-body">
            @include('_message')
            <div class="row">

                @foreach ($allUsers as $item)
                    <div class="col-md-3">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user shadow">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-primary bg-gradient-green">
                                <h3 class="widget-user-username">{{ $item->name }} {{ $item->lastname }}</h3>
                                <h5 class="widget-user-desc">Technician</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src={{ asset('nawong/profile/' . $item->image) }}
                                    alt="User Avatar">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                              
                                    
                                    <div class="description-block ">
                                        <h5 class="description-header">Position</h5>
                                        <span class="description-text">{{ $item->description }}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                
                                <div class="row">
                                    <div class="description-block">
                                        <h5 class="description-header">Designation</h5>
                                        <span class="description-text">Information Technology Officer 1</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="description-block">
                                        <h5 class="description-header">Commodity</h5>
                                        <span class="description-text">
                                            @foreach (json_decode($item->assigned_commodity) as $assignment)
                                            {{ $assignment }}
                                        @endforeach

                                        </span>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="d-flex gap-1">
                                        <div class="description-block">
                                            <a href=""><i
                                                    class="fa-solid fa-pen-to-square btn btn-warning shadow"></i></a>
                                        </div>
                                        <div class="description-block">
                                            <a href=""> <i
                                                    class="fa-solid fa-trash size-64 btn btn-danger shadow"></i></a>
                                        </div>
                                        <div class="description-block">
                                            <a href="{{ url('admin/user/assignment/' . $item->id) }}"
                                                class="btn btn-success">
                                                <i class="fa-solid fa-clipboard-question shadow"></i> Assignment</a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                @endforeach


            </div>
        </div>
    </div>
@endsection
