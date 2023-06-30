@include('layouts.header')
@include('layouts.sidebar')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        @yield('content-details')
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

  @include('layouts.footer')