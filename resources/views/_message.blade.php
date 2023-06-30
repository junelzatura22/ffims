@if (Session::has('success'))
<div class="alert alert-success" role="alert">
  Success!
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger" role="alert">
  Error!
</div>
@endif