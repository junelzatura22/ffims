@extends('layouts.app')

@section('content-details')
    {{-- All start with the row  --}}
    <div class="row">
       This should be the search
    </div>
    <div class="row">
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user shadow">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-primary">
                <h3 class="widget-user-username">Junel B. Dela Cuadra</h3>
                <h5 class="widget-user-desc">Technician</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src={{ asset('dist/img/user1-128x128.jpg')}} alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                    <div class="description-block col-sm-4">
                      <h5 class="description-header">Commodity</h5>
                      <span class="description-text">RICE</span>
                    </div>
                    <div class="description-block col-sm-4">
                        <h5 class="description-header">Assigned Barangay</h5>
                        <span class="description-text">Calapagan</span>    
                    </div>
                    <div class="description-block col-sm-4">
                        <h5 class="description-header">Position</h5>
                        <span class="description-text">Information Technology Officer 1</span>   
                    </div>
                    <!-- /.description-block -->
                </div>
                <div class="">
                    <div class="description-block">
                        <h5 class="description-header">Designation</h5>
                        <span class="description-text">Information Technology Officer 1</span>   
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                           <!-- /.col -->
                  <div class="col-sm-6 border-right">
                    <div class="description-block">
                      <a href=""><i class="fa-solid fa-pen-to-square btn btn-warning shadow"></i></a>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                    <div class="description-block">
                        <a href=""> <i class="fa-solid fa-trash size-64 btn btn-danger shadow"></i></a>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>

           
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
    </div>
@endsection