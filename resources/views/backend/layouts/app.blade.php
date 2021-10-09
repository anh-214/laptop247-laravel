<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','document')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/assets/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/summernote/summernote-bs4.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    {{-- <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> --}}
    @include('backend.layouts._header')
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
        <img src="{{asset('backend/assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">LAPTOP247</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="{{asset('backend/assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
            </div>
        </div>

        

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{url('/admin/dashboard')}}" class="nav-link @if($active == 'dashboard'){{'active'}} @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            <li class="nav-item @if($active == 'categories' || $active == 'products'){{'menu-open'}} @endif">
                <a href="#" class="nav-link @if($active == 'categories' || $active == 'products' ){{'active'}} @endif">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Quản lí
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('admin/categories')}}" class="nav-link @if($active == 'categories'){{'active'}} @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Quản lí thể loại</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/products')}}" class="nav-link @if($active == 'products'){{'active'}} @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Quản lí sản phẩm</p>
                    </a>
                </li>
                </ul>
            </li>
            {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Charts
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/charts/chartjs.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ChartJS</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/charts/flot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Flot</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/charts/inline.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inline</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/charts/uplot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>uPlot</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                    UI Elements
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/UI/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>General</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/UI/icons.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Icons</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/UI/buttons.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Buttons</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/UI/sliders.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sliders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/UI/modals.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Modals & Alerts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/UI/navbar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Navbar & Tabs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/UI/timeline.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Timeline</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/UI/ribbons.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ribbons</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                    Mailbox
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/mailbox/mailbox.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inbox</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/mailbox/compose.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Compose</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/mailbox/read-mail.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Read</p>
                    </a>
                </li>
                </ul>
            </li> --}}
            <li class="nav-item @if($active == 'information' || $active == 'changepassword'){{'menu-open'}} @endif">
                <a href="#" class="nav-link @if($active == 'information' || $active == 'changepassword'){{'active'}} @endif">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Tài khoản
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">3</span>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('admin/information')}}" class="nav-link  @if($active == 'information'){{'active'}} @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thông tin tài khoản</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/changepassword')}}" class="nav-link  @if($active == 'changepassword'){{'active'}} @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Đổi mật khẩu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/logout')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Đăng xuất</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item @if($active == 'accessories'){{'menu-open'}} @endif">
                <a href="#" class="nav-link @if($active == 'accessories'){{'active'}} @endif">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                    Mở rộng
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('admin/extend/accessories')}}" class="nav-link @if($active == 'accessories'){{'active'}} @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Quản lí linh kiện</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="pages/examples/404.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Error 404</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/examples/500.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Error 500</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/examples/pace.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pace</p>
                    </a>
                </li> --}}
                </ul>
            </li>
            
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    @yield('content')
    @include('backend.layouts._footer')
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('backend/assets/plugins/jquery/jquery.min.js')}}"></script>
{{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> --}}
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('backend/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('backend/assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('backend/assets/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('backend/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('backend/assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('backend/assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('backend/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('backend/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/assets/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/assets/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('backend/assets/dist/js/pages/dashboard.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@stack('js')
</body>
</html>

