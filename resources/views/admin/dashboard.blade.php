@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">
        This is the content {{Auth::user()->role}}
    </div>
@endsection