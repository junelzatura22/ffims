@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDesignationModal"><i
                            class="bi-plus-circle me-2"></i>Add New Designation</button>
                </div>
                @include('_message')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">LIST OF DESIGNATION</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered" id="designationTable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Abbreviation</th>
                                    <th>Description</th>
                                    <th>Author</th>
                                    <th>Date Created</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allDesignation as $item)
                                    <tr id={{ $item->d_id }}>
                                        <td></td>
                                        <td class="d_abr">{{ $item->d_abr }}</td>
                                        <td class="d_description"> {{ $item->d_description }} </td>
                                        <td class="">{{ $item->author }}</td>
                                        <td class="">{{ date('F, d Y h:i A', strtotime($item->created_at)) }}</td>
                                        <td>
                                            <a href="" class="text-success mx-1 editBtn" id="editModal"
                                                data-bs-toggle="modal" data-bs-target="#editDesignationModal">
                                                <i class="bi-pencil-square h4"></i></a>
                                            <a href="" class="text-danger mx-1 deleteDesignation"
                                                data-bs-toggle="modal" data-bs-target="#delDesignationModal">
                                                <i class="bi-trash h4"></i></a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>


            </div>
        </div>

        {{-- For the modal  --}}
        <!-- Modal -->
        <div class="modal fade" id="addDesignationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Designation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action={{ url('admin/management/designation') }} method="post" id="addFormDesignation">
                            @csrf
                            <div class="form-group">
                                <label for="">Designation</label>
                                <input type="text" name="d_abr" id="d_abr" class="form-control"
                                    placeholder="Ex. PCIC">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" name="d_description" id="d_description" class="form-control"
                                    placeholder="Ex. Philippine Crop Insurance Corporation">
                                <input type="hidden" name="created_by" id="d_description" class="form-control"
                                    value={{ Auth::user()->id }}>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="submitAddDesignation">Submit</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        {{-- Edit Modal  --}}
        <div class="modal fade" id="editDesignationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Designation (EDIT)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action={{ url('admin/management/edit') }} method="post" id="editFormDesignation">
                            @csrf
                            <div class="form-group">
                                <label for="">Designation</label>
                                <input type="text" name="d_abr" id="d_abr" class="form-control"
                                    placeholder="Ex. PCIC">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" name="d_description" id="d_description" class="form-control"
                                    placeholder="Ex. Philippine Crop Insurance Corporation">
                                <input type="hidden" name="created_by" id="created_by" class="form-control"
                                    value={{ Auth::user()->id }}>
                                <input type="hidden" name="d_id" id="d_id" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning" id="submitAddDesignation">Update</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

        {{-- Delete Modal  --}}

        <div class="modal fade" id="delDesignationModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-3" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action={{ url('admin/management/delete') }} method="post" id="deletFormDesignation">
                            @csrf
                            <div class="form-group">
                                <h3>Are you sure you want to delete?
                                </h3>
                                <input type="hidden" name="d_id" id="d_id" class="form-control"
                                    placeholder="Ex. PCIC">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" id="deleteDesignation">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
