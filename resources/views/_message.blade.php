@if (!empty(Session::has('success')))
    <div class="alert alert-success alert-dismissible fade show m-1" role="alert">
        </strong> {{ session('success') }} <strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif
@if (!empty(Session::has('error')))
    <div class="alert alert-danger alert-dismissible fade show m-1" role="alert">
        <strong> {{ session('error') }} </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (!empty(Session::has('edit_success')))
    <div class="alert alert-warning alert-dismissible fade show m-1" role="alert">
        </strong> {{ session('edit_success') }} <strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif
@if (!empty(Session::has('delete_success')))
    <div class="alert alert-info alert-dismissible fade show m-1" role="alert">
        </strong> {{ session('delete_success') }} <strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif

@if (!empty(Session::has('edit_success')))
    <div class="alert alert-warning alert-dismissible fade show m-1" role="alert">
        </strong> {{ session('edit_success') }} <strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif