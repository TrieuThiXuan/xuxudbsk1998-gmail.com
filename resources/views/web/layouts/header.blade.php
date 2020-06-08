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
                                <a href="#" onclick="loginModal()" data-toggle="modal">
                                    Đăng nhập</a>
                            </div>
                            <span class="mx-2 color-white">|</span>
                            <div><a href="{{ route('optionRegister') }}">Đăng ký</a></div>
                        @else
                            <p>{{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
                            <span class="text-black-50 font-header ellipsis">Logout</span>
                            <a class="text-black-50 align-self-center ellipsis" href="{{ route('logout') }}"
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
                        <a class="nav-link" href="#">Trang chủ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Khuyến mãi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đối tác</a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
</div>
<div class="slider">
    <div class="container">
{{--        <div class="slider d-flex align-items-center justify-content-center">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <input class="" placeholder="Tìm kiếm">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-4">--}}
{{--                    <select class="form-control">--}}
{{--                        <option value="1">Thể loại</option>--}}
{{--                        <option value="1">1</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="col-4">--}}
{{--                    <select class="form-control">--}}
{{--                        <option value="1">Ví điện tử</option>--}}
{{--                        <option value="1">Thẻ ngân hàng</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="col-4">--}}
{{--                    <select class="form-control">--}}
{{--                        <option value="1">Địa điểm</option>--}}
{{--                        <option value="1">1</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="slider d-flex flex-column align-items-center justify-content-center">
            <div class="input-search mb-4">
                <div class="row">
                    <div class="col-12">
                        <input name="search" class="form-control" placeholder="Tìm kiếm">
                    </div>
                </div>
            </div>
            <div class="mutil-input-search">
                 <div class="row">
                     <div class="col-4">
                         <select class="form-control">
                             <option value="1">Thể loại</option>
                             <option class="1">1</option>
                         </select>
                     </div>
                     <div class="col-4">
                         <select class="form-control">
                             <option value="1">Ví điện tử</option>
                             <option class="2">Thẻ ngân hàng</option>
                         </select>
                     </div>
                     <div class="col-4">
                         <select class="form-control">
                             <option value="1">Địa điểm</option>
                             <option class="1">Hà Nội</option>
                             <option class="1">Hồ Chí Minh</option>
                         </select>
                     </div>
                 </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        @yield('content')
    </div>
</div>
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
<input type="hidden" id="loginPortal" value="{{ route('login_portal') }}">
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
     function loginModal() {
         $('#loginModal').modal('show');
    }
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function loginUser() {
            let email = $('#emailLogin').val();
            let password = $('#passwordLogin').val();
            console.log($('#loginPortal').val())
            $.ajax({
                url: $('#loginPortal').val(),
                type: 'POST',
                data: {
                    email: email,
                    password: password,
                },
                success: function (data) {
                    if (data.status === true) {
                        location.reload();
                    } else {
                        $('#loginModal').modal('hide');
                        let $modal = $('#modalErrorSendEmail');
                        if (data.error_status) {
                            $modal = $('#inActiveAccount');
                            $modal.find('.httv-resend-mail-active').attr('data-href', data.resend_active_mail_href)
                        }
                        $modal.find('.message').text(data.message);
                        $modal.modal('show');
                    }
                },
                error: function (error) {
                    alert(error);
                    $('#loginModal').modal('hide');
                    $('#modalErrorSendEmail .message').text(MESSAGE.error_global);
                    $('#modalErrorSendEmail').modal('show');
                }
            });
        }
        window.loginUser = loginUser;
    });
</script>
@yield('script')
</body>
</html>
