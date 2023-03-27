<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel {{isset($title)?'| '.$title:''}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin-assets/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/summernote/summernote-bs4.min.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{asset('admin-assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Config::get('languages')[App::getLocale()] }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            @foreach (Config::get('languages') as $lang => $language)
            @if ($lang != App::getLocale())
            <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
            @endif
            @endforeach
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="{{route('logout')}}" class="dropdown-item">
              Logout
            </a>
          </div>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><a href="#"><b>{{__('messages.dashboard')}}</b></a></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb">
                <!-- List -->
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>


      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
          <img src="{{asset('admin-assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Demo</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{asset('images/Admins-images/'.Auth()->user()->image)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{Auth()->user()->name}}</a>
            </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    {{__('messages.dashboard')}}
                  </p>
                </a>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    {{__('messages.accounts_management')}}
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>

                <ul class="nav nav-treeview">
                  @can('role-list')
                  <li class="nav-item">
                    <a href="{{route('roles.index')}}" class="nav-link">
                      <i class="nav-icon fas "></i>
                      <p>{{__('messages.roles')}}</p>
                    </a>
                  </li>
                  @endcan
                  @can('role-create')
                  <li class="nav-item">
                    <a href="{{route('roles.create')}}" class="nav-link">
                      <i class="nav-icon fas "></i>
                      <p>{{__('messages.create_role')}}</p>
                    </a>
                  </li>
                  @endcan
                  @can('user-list')
                  <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link">
                      <i class="nav-icon fas "></i>
                      <p>{{__('messages.users')}}</p>
                    </a>
                  </li>
                  @endcan
                  @can('user-create')
                  <li class="nav-item">
                    <a href="{{route('users.create')}}" class="nav-link">
                      <i class="nav-icon fas "></i>
                      <p>{{__('messages.create_user')}}</p>
                    </a>
                  </li>
                  @endcan
                  @can('employee-list')
                  <li class="nav-item">
                    <a href="{{route('employees.index')}}" class="nav-link">
                      <i class="nav-icon fas "></i>
                      <p>{{__('messages.employees')}}</p>
                    </a>
                  </li>
                  @endcan
                  @can('employee-create')
                  <li class="nav-item">
                    <a href="{{route('employees.create')}}" class="nav-link">
                      <i class="nav-icon fas "></i>
                      <p>{{__('messages.create_employee')}}</p>
                    </a>
                  </li>
                  @endcan
                  @can('company-list')
                  <li class="nav-item">
                    <a href="{{route('companies.index')}}" class="nav-link">
                      <i class="nav-icon fas "></i>
                      <p>{{__('messages.companies')}}</p>
                    </a>
                  </li>
                  @endcan
                  @can('company-create')
                  <li class="nav-item">
                    <a href="{{route('companies.create')}}" class="nav-link">
                      <i class="nav-icon fas "></i>
                      <p>{{__('messages.create_company')}}</p>
                    </a>
                  </li>
                  @endcan
                  @can('note-list')
                  <li class="nav-item">
                    <a href="{{route('notes.index')}}" class="nav-link">
                      <i class="nav-icon fas "></i>
                      <p>{{__('messages.notes')}}</p>
                    </a>
                  </li>
                  @endcan
                  @can('note-create')
                  <li class="nav-item">
                    <a href="{{route('notes.create')}}" class="nav-link">
                      <i class="nav-icon fas "></i>
                      <p>{{__('messages.create_note')}}</p>
                    </a>
                  </li>
                  @endcan
                  @can('userhasnotes-list')
                  <li class="nav-item">
                    <a href="{{route('userhasnotes.index')}}" class="nav-link">
                      <i class="nav-icon fas "></i>
                      <p>{{__('messages.assign_note_to_user')}}</p>
                    </a>
                  </li>
                  @endcan
                </ul>
                </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
      <div class="container mt-5">

        @yield('content')

      </div>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    </section>
  </div>
  </div>
  </div>
  <!-- ./wrapper -->
  <!-- jQuery -->
  <script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('admin-assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{asset('admin-assets/plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Sparkline -->
  <script src="{{asset('admin-assets/plugins/sparklines/sparkline.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{asset('admin-assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('admin-assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{asset('admin-assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{asset('admin-assets/plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('admin-assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{asset('admin-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  <script src="{{asset('admin-assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('admin-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('admin-assets/dist/js/adminlte.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('admin-assets/dist/js/demo.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{asset('admin-assets/dist/js/pages/dashboard.js')}}"></script>
</body>
<footer class="main-footer">
  <strong>Copyright &copy; 2022 <a href="#">Demo.com</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0.0
  </div>
</footer>

</html>