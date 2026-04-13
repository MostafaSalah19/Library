<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title', 'Library System')</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('admin/fonts/SansPro/SansPro.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap_rtl-v4.2.1/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap_rtl-v4.2.1/custom_rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/mycustomstyle.css') }}">

</head>

<body class="hold-transition sidebar-mini">


    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                @auth
                    <form method="POST" action="{{ route('logout') }}" id="logout">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-ghost">Log Out</button>
                    </form>
                @else
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('registration.create') }}" class="btn btn-primary">Register</a>
                        <a href="{{ route('login') }}" class="btn btn-secondary">Log In</a>
                    </li>
                @endauth

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Libarary</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    @can('view-admin')
                        <div class="info">
                            <a href="/hi" class="d-block">Admin</a>
                        </div>
                    @endcan
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('books.index') }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Books</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('authors.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Authors</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('book-copies.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Book Copies</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('categories.index') }}" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('members.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Members</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('loans.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Loans</p>
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
                            <h1 class="m-0 text-dark">@yield('name', 'Home')</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row" style="padding-top: 50px">
                        @yield('content')
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    @yield('scripts')
</body>

</html>
