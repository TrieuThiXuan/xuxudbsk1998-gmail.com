<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}"/>
</head>
<body>
<header>
    <div class="container">
        <div class="nav-bar py-2">
            <div class="row">
                <div class="logo col-6">
                    <div class="w-25">
                        <img src="{{ asset('storage/images/Photo-0072.jpg') }}" class="w-100 h-50">
                    </div>
                </div>
                <div class="login-box col-6">
                    <div class="d-flex flex-row offset-2">
                        @guest()
                            <div class="login">
                                <a href="{{ route('optionLogin') }}">
                                    Đăng nhập</a>
                            </div>
                            <span class="mx-2 color-white">|</span>
                            <div><a href="{{ route('optionRegister') }}">Đăng ký</a></div>
                        @else
                            @if(Illuminate\Support\Facades\Auth::user()->isVendor())
                            <a class="align-self-center color-white" href="{{ route('avatar_profile', Illuminate\Support\Facades\Auth::id()) }}">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
                            @else
                                <span class="align-self-center color-white">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                            @endif
                            <span class="align-self-center font-header ellipsis color-white mx-2">|</span>
                            <a class="align-self-center ellipsis" href="{{ route('logout') }}"
                               onclick="event.preventDefault();　document.getElementById('logout-form').submit();">
                                {{ __('Thoát') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout_portal') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="menu color-3aad92">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('index') }}">Trang chủ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category') }}">Khuyến mãi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('getVendor') }}">Đối tác</a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
</div>
@yield('content')
<footer>
    <div class="row text-center align-items-center color-white font-14">
        <div class="col-2">
            <p class="font-12">Giới thiệu</p>
        </div>
        <div class="col-2">
            <p class="font-12">Quy chế hoạt động</p>
        </div>
        <div class="col-2">
            <p class="font-12">Chính sách bảo mật</p>
        </div>
        <div class="col-2">
            <p class="font-12">Điều kiện và điều khoản</p>
        </div>
        <div class="col-2">
            <p class="font-12">Quy chế quản lý</p>
        </div>
        <div class="col-2">
            <p class="font-12">Trợ giúp</p>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-12">
            <p>xuanttbkhn
            </p>
        </div>
    </div>
</footer>
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="{{ asset('js/slick.js') }}"></script>
@yield('script')
</body>
</html>
