<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@if (trim($__env->yieldContent('template_title')))
            @yield('template_title') |
        @endif {{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="/dist/css/custom.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="/dist/img/loading.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Xem trang bán hàng</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 đơn hàng đang chờ duyệt</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">Xem tất cả</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button" title="Hiển thị toàn màn hình">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="logout()" role="button" title="Đăng xuất">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                </a>
            </li>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/admin" class="brand-link">
            <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">QUẢN LÝ BÁN SÁCH</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    @php
                        $adminName = session('admin_name');
                    @endphp
                    <a href="#" class="d-block">{{ $adminName }}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Nhập nội dung tìm kiếm"
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="/admin" class="nav-link {{ set_active('admin-dashboard') }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Trang tổng quan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-is-opening menu-open">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-user"></i>
                            <p>
                                Quản lý tài khoản
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: block;">
                            <li class="nav-item">
                                <a href="{{ route("user.index") }}" class="nav-link {{ set_active('user.*') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Người dùng
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("admin.index") }}" class="nav-link {{ set_active('admin.*') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Quản trị viên
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-is-opening menu-open">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-book"></i>
                            <p>
                                Quản lý sách
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: block;">
                            <li class="nav-item">
                                <a href="{{ route("book.index") }}" class="nav-link {{ set_active('book.*') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Sách
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("bookset.index") }}" class="nav-link {{ set_active('bookset.*') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Bộ sách
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("publisher.index") }}" class="nav-link {{ set_active('publisher.*') }}">
                            <i class="fa-solid fa-newspaper"></i>
                            <p>
                                Nhà xuất bản

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("supplier.index") }}" class="nav-link {{ set_active('supplier.*') }}">
                            <i class="fa-solid fa-industry"></i>
                            <p>
                                Nhà cung cấp
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("coupon.index") }}" class="nav-link {{ set_active('coupon.*') }}">
                            <i class="fa-solid fa-tag"></i>
                            <p>
                                Mã giảm giá
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("category.index") }}" class="nav-link {{ set_active('category.*') }}">
                            <i class="fa-solid fa-bars"></i>
                            <p>
                                Danh mục

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("genre.index") }}" class="nav-link {{ set_active('genre.*') }}">
                            <i class="fa-solid fa-bars-staggered"></i>
                            <p>
                                Thể loại

                            </p>
                        </a>
                    </li>

                    <li class="nav-item menu-is-opening menu-open">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-file-invoice"></i>
                            <p>
                                Quản lý hoá đơn
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: block;">
                            <li class="nav-item">
                                <a href="{{ route("purchase-order.index") }}"
                                   class="nav-link {{ set_active('purchase-order.*') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Hoá đơn nhập
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("sales-order.index") }}"
                                   class="nav-link {{ set_active('sales-order.*') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Hoá đơn bán
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@if (trim($__env->yieldContent('template_title')))
                                @yield('template_title')
                            @endif</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">@if (trim($__env->yieldContent('template_title')))
                                    @yield('template_title')
                                @endif</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard.js"></script>
<script src="/dist/js/custom.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
<script>
    const readListScripts = {
        showTableActions() {
            event.currentTarget.querySelector('td:last-child').style.display = "block";
        },

        hideTableActions() {
            event.currentTarget.querySelector('td:last-child').style.display = "none";
        }
    }

    function printPDF() {
        window.print();
    }

    document.querySelector('.col-sm-12 .card .card-header #buttons-pdf').addEventListener('click', printPDF);

    document.querySelector('.col-sm-12 .card .card-header #buttons-excel').addEventListener('click', function () {
        exportToExcel();
    });

    $(document).ready(function () {
        $('#statusFilter')?.change(function () {
            $('#filterForm').submit();
        });
        $('#searchInput')?.keypress(function (e) {
            if (e.which === 13) {
                $('#searchForm').submit();
            }
        });
    });

    function logout() {
        event.preventDefault();
        if(confirm('Bạn có muốn đăng xuất không ?'))
        {
            document.getElementById('logout-form').submit();
        }
    }
</script>
@yield('exportToExcelScripts');
@yield('formBookScripts');
@yield('formPurchaseOrderScripts');
</body>
</html>
