@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">


        <form action={{ url('admin/management/commodity') }} method="post">
            @csrf
            <div class="form-group">
                <label for=""></label>
                <input type="password" name="password" id="password" class="form-control" placeholder=""
                    aria-describedby="helpId">
                <small id="helpId" class="text-muted">Help text</small>

            </div>
            <input type="submit" value="Submit">
        </form>

    </div>
@endsection
