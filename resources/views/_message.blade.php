@if (!empty(Session::has('success')))
    <div class="alert alert-success alert-dismissible fade show m-1" role="alert">
        <strong>SUCCESS! </strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (!empty(Session::has('error')))
    <div class="alert alert-danger alert-dismissible fade show m-1" role="alert">
        <strong>ERROR! </strong> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
