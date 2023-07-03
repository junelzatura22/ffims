@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">


        <div class="col-lg-12">

            <div class="card shadow">
                <div class="card-header">

                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPositionModal"><i
                            class="bi-plus-circle me-2"></i>Add New Position</button>


                </div>
                <div class="card-body" id="show_position">
                    <h1 class="text-center text-secondary my-5">Data is fetching...</h1>
                </div>
            </div>
        </div>

        {{-- new employee modal --}}
        <div class="modal fade" id="addPositionModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Position</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" id="add_position_form">
                        @csrf

                        <div class="modal-body p-4 bg-light">
                            <div class="row">
                                <div class="form-group">
                                    <label for="description">Position (Description)</label>
                                    <input type="text" name="p_desc" id="p_desc" class="form-control"
                                        placeholder="Position">
                                </div>
                                <input type="hidden" name="userid" class="form-control" value={{ Auth::user()->id }} />
                                <div class="form-group">
                                    <label for="rank">Rank</label>
                                    <input type="number" name="rank" id="rank" class="form-control"
                                        placeholder="Rank">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="add_position_btn" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- end new employee modal --}}
        {{-- edit employee modal --}}
        <div class="modal fade" id="editPositionModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Position</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" id="edit_position_form">
                        @csrf
                        <div class="modal-body p-4 bg-light">
                            <div class="row">
                                <div class="form-group  col-md-8">
                                    <label for="description">Position (Description)</label>
                                    <input type="text" name="p_desc" id="p_desc" class="form-control"
                                        placeholder="Position" required>
                                </div>
                                <input type="hidden" name="userid" class="form-control" value={{ Auth::user()->id }} />
                                {{-- this hidden id is not actually necessary  --}}
                                <input type="hidden" name="p_id" id="p_id" class="form-control" />
                                <div class="form-group col-md-4">
                                    <label for="Ranks">Rank</label>
                                    <input type="number" name="rank" id="rank" class="form-control "
                                        placeholder="Rank" required>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="edit_position_btn" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- end edit employee modal --}}



    </div>
@endsection

