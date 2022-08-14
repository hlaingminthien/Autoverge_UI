<!DOCTYPE html>
<html>
  <head>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Auto Verge | Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('plugins/ionicframework/ionicons.min.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    {{-- <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">

    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    
    <!-- Scripts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    
  </head>
  <body class="hold-transition sidebar-mini layout-fixed" style="overflow:hidden;">
    <div class="wrapper">

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
              <i class="fas fa-chevron-left" style="color:#Faa028 !important;"></i>
              <span style="padding-left:10px;font-weight:bold;font-size:15px;" id="shopName"></span>
            </a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <div style="width: 100%;
          height: auto;
          padding: 0px 10px;
          border-radius: 7px;
          background-color: #F6FAFE">
            <div>
              <img src="" id="profileimg" style="display:none;float: left;border-radius:5px;width: 40px;margin: 5px 0px;">
            </div>	
            <div style="margin-left:50px;min-width:72%;margin-top:5px;">
              <div class="d-block" style="font-weight:bold;font-size:11px;" id="loginName"></div>
              <div class="d-block" style="font-size:10px;color:#2846f0;" id="loginLevel"></div>
            </div>
          </div>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fas fa-cog" style="padding-top: 1.5em; font-size: 24px;padding:2px;"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
              
              <a href="{{ url('/password') }}" id="changPassword" class="dropdown-list-item">
                Change Password
              </a>
              <a href="{{ url('/logout') }}" id="logout" class="dropdown-list-item">
                Language
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-light-light elevation-4" style="box-shadow: 0 1px 20px 0 rgba(64, 64, 65, 0.15)!important;">
        <!-- Brand Logo -->
        <div style="margin-top: 7px;
        margin-left: -5px;
        max-height: 41px;">
        </div>
        
        <hr style="color:#807c7c;">

        <!-- Sidebar -->
        <div class="sidebar">
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li id="user_mnu" class="nav-item side-menu {{ request()->is('*users*') ? 'menu-open' : '' }}">
                  <a href="{{ url('/users') }}" class="nav-link" id="users">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Users</span>
                  </a>
                </li>
                
                <li id="service_mnu" class="nav-item side-menu {{ request()->is('*service*') ? 'menu-open' : '' }}">
                  <a href="{{ url('/service') }}" class="nav-link" id="service">
                  <i class="fa fa-car" aria-hidden="true"></i>
                    <span>Service</span>
                  </a>
                </li>
                
                <li id="customer_mnu" class="nav-item side-menu {{ request()->is('*customer*') ? 'menu-open' : '' }}">
                  <a href="{{ url('/customer') }}" class="nav-link" id="customer">
                  <i class="fa fa-sign-language" aria-hidden="true"></i>
                    <span>Customer</span>
                  </a>
                </li>
                
                <li id="booking_mnu" class="nav-item side-menu {{ request()->is('*booking*') ? 'menu-open' : '' }}">
                  <a href="{{ url('/booking') }}" class="nav-link" id="booking">
                  <i class="fa fa-book" aria-hidden="true"></i>
                    <span>Booking</span>
                  </a>
                </li>
              
                <br>
                <li id="logout_mnu" class="logout nav-item side-menu">
                  <a style="text-align:center;" href="{{ url('/logout') }}" id="logout" class="dropdown-item">
                    <img src="{{ asset('dist/img/web icons/Side Menu Bar Icons/log out@2x.png') }}" 
                    class="nav-icon" style="width:11%;"> <span style="color:#FFFFFF">Logout</span>
                  </a>
                </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="backgroud-color:#FFFFFF !important;height: 150px;
    overflow: hidden auto;">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                @yield('content')
            </div>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>

    
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>

    <!-- datatable -->
    <script src = "https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js" defer ></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script> 
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
  </body>
</html>

<!--  -->
<script>
  var userid = localStorage.getItem("userid");
  var name = localStorage.getItem("name");
  var token = localStorage.getItem("token");

  $(document).ready(function() {

    document.getElementById('loginName').innerText = "Hi, "+name;
  });
    
</script>

<style>
  .os-theme-dark>.os-scrollbar, .os-theme-light>.os-scrollbar {
    padding: 6px;
    box-sizing: border-box;
    background: 0 0;
  }
</style>
