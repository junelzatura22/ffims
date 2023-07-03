  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src={{asset("dist/img/AdminLTELogo.png")}} alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">FFIMS - LUPON</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src={{asset("dist/img/user2-160x160.jpg")}} class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          

               @switch(Auth::user()->role)
                   @case('Admin')
                   <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        Dashboard
                      </p>
                    </a>
                  </li>
                  <li class="nav-header">MANAGEMENT</li>
                  <li class="nav-item @if(Request::segment(2)=='management') menu-open @endif">
                    <a href="#" class="nav-link @if(Request::segment(2)=='management') active @endif">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                        MANAGEMENT
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">2</span>
                      </p>
                    </a>
                    {{-- <ul class="nav nav-treeview @if(Request::segment(2)=='management') menu-open @endif"> --}}
                    <ul class="nav nav-treeview ">
                     
                      <li class="nav-item">
                        <a href={{url('admin/management/position')}} class="nav-link {{ Request::is('admin/management/position') ? 'active' : '' }}">
                          <i class="fa-solid fa-check-to-slot nav-icon"></i>
                          <p>Position</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href={{url('admin/management/designation')}} class="nav-link {{ Request::is('admin/management/designation') ? 'active' : '' }}">
                          <i class="fa-solid fa-check-to-slot nav-icon"></i>
                          <p>Designation</p>
                        </a>
                      </li>
                     
                    </ul>
                  </li> 
               
                  <li class="nav-header">ACCOUNTS</li>
              
                  <li class="nav-item">
                    <a href={{url('admin/user/list')}} class="nav-link {{ Request::is('admin/user/list') ? 'active' : '' }}">
                    {{-- <a href={{url('admin/user/list')}} class="nav-link @if(Request::segment(2)=='user') active @endif"> --}}
                      <i class="fa-solid fa-user nav-icon"></i>
                      <p>
                        User
                      </p>
                    </a>
                  </li>
                  <li class="nav-header">SETTNGS</li>
              
                  <li class="nav-item">
                    <a href={{ url('logout') }} class="nav-link">
                      <i class="nav-icon far fa-image"></i>
                      <p>
                        Logout
                      </p>
                    </a>
                  </li>
                       @break
                   @case('Technician')
                   <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        Dashboard
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href={{url('admin/user/list')}} class="nav-link @if(Request::segment(2)=='user') active @endif">
                      <i class="fa-solid fa-user nav-icon"></i>
                      <p>
                        My Account
                      </p>
                    </a>
                  </li>
                  <li class="nav-header">SETTNGS</li>
              
                  <li class="nav-item">
                    <a href={{ url('logout') }} class="nav-link">
                      <i class="nav-icon far fa-image"></i>
                      <p>
                        Logout
                      </p>
                    </a>
                  </li>
                       @break
                   @default
                       
               @endswitch
        

        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>