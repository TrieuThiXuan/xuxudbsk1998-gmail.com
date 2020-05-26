<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
</head>
<body>
<div class="nav-bar">
    <div class="row">
        <div class="logo col-6"><img src="#"></div>
        <div class="login-box col-6">
            <div class="d-flex flex-row offset-2">
                <div class="login">
                    <a href="#" onclick="loginModal()" data-toggle="modal">
                        Đăng nhập</a>
                </div>
                <span class="mx-2">|</span>
                <div><a href="{{ route('optionRegister') }}">Đăng ký</a></div>
            </div>
        </div>
    </div>
</div>
<div class="menu">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Trang chủ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Trang chủ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Khuyến mãi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đối tác</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>
</div>
@yield('content')
<footer>
    <div class="container">
        <div class="row">
            <div class="col-2">
                <p>Giới thiệu</p>
            </div>
            <div class="col-2">
                <p>Quy chế hoạt động</p>
            </div>
            <div class="col-2">
                <p>Chính sách bảo mật</p>
            </div>
            <div class="col-2">
                <p>Điều kiện và điều khoản</p>
            </div>
            <div class="col-2">
                <p>Quy chế quản lý</p>
            </div>
            <div class="col-2">
                <p>Trợ giúp</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>xuanttbkhn
                </p>
            </div>
        </div>
    </div>
</footer>
@include('modals.login')
<script>
     function loginModal() {
         $('#loginModal').modal('show');
    }
</script>
</body>
</html>
