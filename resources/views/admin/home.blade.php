<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin_index.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script
        src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"
        integrity="sha256-DI6NdAhhFRnO2k51mumYeDShet3I8AKCQf/tf7ARNhI="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
</head>
<body>
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" role="button" data-toggle="collapse" href="#collapseExample">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <div class="navbar-nav ml-auto">
            @auth
                <div class="nav-item dropdown">
                    <span>
                        {{ Auth::user()->name }}
                    </span>
                    <a class="align-self-center ellipsis" href="{{ route('logout') }}"
                       onclick="event.preventDefault();　document.getElementById('logout-form').submit();">
                        {{ __('Thoát') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </div>
            @endauth
        </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
{{--                <div class="image">--}}
{{--                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
{{--                </div>--}}
                <div class="info">
                    <a href="#" class="d-block">   @auth()
                            <div class="text-center">
             <span class="brand-text font-weight-light color-white">
                {{ \Illuminate\Support\Facades\Auth::user()->name  }}
            </span>
                            </div>
                        @endauth
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
         @include('admin.layouts.sidebar')
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content mt-2">
            <div class="container-fluid">
               @yield('content')
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">Xuantt.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.4
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
        });
        // $(document).on('click', '.pushmenu', function () {
        //     $('.main-sidebar ').collapse();
        // })
        let url = window.location;
        $('.nav-item a').filter(function () {
            return this.href == url;
        }).addClass('active-bg');

    });
</script>
<script> CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
</script>
@yield('script')
</body>
</html>


