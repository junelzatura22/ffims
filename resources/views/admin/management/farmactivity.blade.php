@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">

        <div class="card">
            
            <div class="card-body">
              
                <form action="" method="get">
                    <div class="row">
                        <h4 class="text-info p-2">Search Activity</h4>

                        <div class="form-group col-md-5">
                            <label for="" class="form-label">Commodity</label>
                            <select name="cid" id="cid" class="form-control">
                                <option value="">Select</option>
                                @foreach ($commodityList as $commodityItem)
                                    <option value="{{ $commodityItem->com_id }}" {{ Request::get('cid') == $commodityItem->com_id ? 'selected' : '' }}>{{ $commodityItem->com_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="" class="form-label">Activity</label>
                            <div class="input-group input-group-sm">
                                <input type="search" name="searchKey" class="form-control form-control-lg"
                                    placeholder="Ex. Carabao" value={{Request::get('searchKey')}}>
                              
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="" class="form-label text-white">Action</label>
                            <div class="input-group ">
                                <button type="submit" class="btn btn-lg bg-gradient-green mr-1">
                                    <i class="fa fa-search"></i>
                                </button>
                                <a href="{{url('admin/management/farmactivity')}}"  class="btn btn-lg bg-gradient-green">
                                    <i class="fa-regular fa-circle-left"></i> Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="font-weight-bold"><span class="text-info">Farming Activity:</span> <span
                            class="badge bg-gradient-green text-lg">{{ $farmingActivityData->total() }}</span></h6>
                    <button class="btn bg-gradient-green bi-plus-circle me-2" data-bs-toggle="modal"
                        data-bs-target="#addFarmingActivity"> Add Activity</button>
                </div>
            </div>
            @include('_message')
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 50px" class="bg-gradient-green text-sm font-weight-bold text-center">#
                                </th>
                                <th>Activity</th>
                                <th>Program</th>
                                <th>Author</th>
                                <th>Date Created</th>
                                <th style="width: 100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($farmingActivityData as $index => $item)
                                <tr id={{ $item->fa_id }}>
                                    <td class="bg-gradient-green text-sm font-weight-bold text-center">
                                        {{ $farmingActivityData->firstItem() + $index }}</td>
                                    <td class="fa_name">{{ $item->fa_name }}</td>
                                    <td class="c_name">{{ $item->c_name }}</td>
                                    <td>{{ $item->author }} </td>
                                    <td class="com_id" style="display: none">{{ $item->commodity_id }} </td>
                                    <td class="">{{ date('F, d Y h:i A', strtotime($item->created_at)) }}</td>
                                    <td>
                                        <a href="" class="text-success mx-1 getEditFarmingActivityBtn"
                                            data-bs-toggle="modal" data-bs-target="#editFarmingActivity">
                                            <i class="bi-pencil-square h5"></i></a>
                                        <a href="" class="text-danger mx-1 getDeleteFarmingActivityBtn"
                                            data-bs-toggle="modal" data-bs-target="#deleteFarmingActivity">
                                            <i class="bi-trash h5"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {!! $farmingActivityData->links() !!}
                    </ul>
                </div>

            </div>
        </div>
    </div>



    {{-- ADD modal this is for the modal  --}}
    <!-- Modal -->
    <div class="modal fade" id="addFarmingActivity" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Farming Activity | Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin/management/farmactivity') }}" method="post" id="addFarmingActivityForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Activity">Activity</label>
                            <input type="text" class="form-control" name="fa_name" id="fa_name"
                                placeholder="Ext. Rice">
                            <input type="hidden" value={{ Auth::user()->id }} name="userid" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Commodity</label>
                            <select name="commodity_id" id="commodity_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($commodityList as $commodityItem)
                                    <option value="{{ $commodityItem->com_id }}">{{ $commodityItem->com_name }}
                                    </option>
                                @endforeach
                            </select>
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
    <div class="modal fade" id="editFarmingActivity" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Farming Activity | Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin/management/edit') }}" method="post" id="editFarmingActivityForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Activity">Activity</label>
                            <input type="text" class="form-control" name="fa_name" id="fa_name"
                                placeholder="Ext. Rice">
                            <input type="hidden" value={{ Auth::user()->id }} name="userid" />
                            <input type="hidden" name="fa_id" id="fa_id" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Commodity</label>
                            <select name="commodity_id" id="commodity_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($commodityList as $commodityItem)
                                    <option value="{{ $commodityItem->com_id }}">{{ $commodityItem->com_name }}
                                    </option>
                                @endforeach
                            </select>
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
    {{-- END modal this is for the modal  --}}
    {{-- DELETE modal this is for the modal  --}}
    <!-- Modal -->
    <div class="modal fade" id="deleteFarmingActivity" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Farming Activity | Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin/management/delete') }}" method="post" id="deleteFarmingActivityForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <h4><strong>Are you sure you want to delete?</strong></h4>
                            <input type="hidden" name="fa_id" id="fa_id" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Maybe Later</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END modal this is for the modal  --}}
@endsection
