@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">



        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Search</h3>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="font-weight-bold"><span class="text-info">TOTAL PROGRAM(S):</span> <span
                            class="badge bg-gradient-green text-lg">{{ $commodityList->total() }}</span></h6>
                    <button class="btn bg-gradient-green bi-plus-circle me-2" data-bs-toggle="modal"
                        data-bs-target="#addCommodityModal"> Add Program</button>

                </div>
            </div>
            @include('_message')

            <!-- /.card-header -->
            <div class="card-body">

                
                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 50px" class="bg-gradient-green text-sm font-weight-bold text-center">#</th>
                                <th>Program/Sector</th>
                                <th>Author</th>
                                <th>Date Created</th>
                                <th style="width: 100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commodityList  as $index=>$item)
                                <tr id={{ $item->com_id }}>
                                    <td class="bg-gradient-green text-sm font-weight-bold text-center">
                                        {{$commodityList->firstItem() +$index}}</td>
                                    <td class="com_name">{{ $item->com_name }}</td>
                                    <td>{{ $item->author }} </td>
                                    <td class="">{{ date('F, d Y h:i A', strtotime($item->created_at)) }}</td>
                                    <td>
                                        <a href="" class="text-success mx-1 getEditCommodity" id="editCommodityModal_"
                                            data-bs-toggle="modal" data-bs-target="#editCommodityModal">
                                            <i class="bi-pencil-square h5"></i></a>
                                        <a href="" class="text-danger mx-1 getDeleteCommodity" data-bs-toggle="modal"
                                            data-bs-target="#deleteCommodityModal">
                                            <i class="bi-trash h5"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {!! $commodityList->links() !!}
                    </ul>
                </div>
            </div>

        </div>


        {{-- ADD modal this is for the modal  --}}
        <!-- Modal -->
        <div class="modal fade" id="addCommodityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Commodity</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action={{ route('store.commodity') }} method="post" id="addCommodityForm">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Commodity/Program Name</label>
                                <input type="text" class="form-control" name="commodity" id="commodity"
                                    placeholder="Ext. Rice">
                                <input type="hidden" value={{ Auth::user()->id }} name="userid" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- END modal this is for the modal  --}}
        {{-- EDIT modal this is for the modal  --}}
        <!-- Modal -->
        <div class="modal fade" id="editCommodityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Commodity</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('edit.commodity') }}" method="post" id="editCommodityForm">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Commodity/Program Name</label>
                                <input type="text" class="form-control" name="commodity" id="commodity"
                                    placeholder="Ext. Rice">
                                <input type="hidden" value={{ Auth::user()->id }} name="userid" />
                                <input type="hidden" name="com_id" id="com_id" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- EDIT modal this is for the modal  --}}
        {{-- DELETE modal this is for the modal  --}}
        <!-- Modal -->
        <div class="modal fade" id="deleteCommodityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete Commodity</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action={{ route('delete.commodity') }} method="post" >
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for=""><h5>Are you sure you want to delete (yes/no)?</h5></label>
                                <input type="hidden" name="com_id" id="com_id" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Maybe Later</button>
                            <button type="submit" class="btn btn-danger">Yes Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- DELETE modal this is for the modal  --}}



    </div>
@endsection
