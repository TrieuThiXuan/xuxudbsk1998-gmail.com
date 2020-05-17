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
</head>
<body>
<div class="nav-bar">
    <div class="logo"><img src="#"></div>
    <div class="login-box">
        <div class="row">
            <div class="col-6">
                <div class="login"><p>Đăng nhập</p></div>
                <span>|</span>
                <div><p>Đăng ký</p></div>
            </div>
        </div>
    </div>
</div>
<div class="menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>
<div class="slider">
    <div class="row">
        <div class="col-12">
            <input class="" placeholder="Tìm kiếm">
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <select class="form-control">
                <option value="1">Thể loại</option>
                <option value="1">1</option>
            </select>
        </div>
        <div class="col-4">
            <select class="form-control">
                <option value="1">Ví điện tử</option>
                <option value="1">Thẻ ngân hàng</option>
            </select>
        </div>
        <div class="col-4">
            <select class="form-control">
                <option value="1">Địa điểm</option>
                <option value="1">1</option>
            </select>
        </div>
    </div>
</div>
<div class="content">
    <div class="theme">
        <div class="row">
            <div class="col-12">
                <h3>Chủ đề khuyến mãi</h3>
            </div>
        </div>
        <div class="row">
        @foreach($categories as $category)
            <div class="col-4">
                <div class="img-box">
                    <img src="{{ $category->image }}" class="w-100">
                    <p>{{ $category->name }}</p>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <div class="vendor">
        <div class="row">
            <div class="col-12">
                <h3>Đối tác liên kết</h3>
            </div>
        </div>
    </div>
</div>
<footer>
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
</footer>
</body>
</html>
