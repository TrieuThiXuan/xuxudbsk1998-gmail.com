@extends('web.layouts.header')
@section('content')
    @include('web.layouts.slider')
    <div class="content mb-5">
        <div class="container">
            <div class="h-240 d-flex justify-content-center align-items-center">
                <a href="#" class="btn btn-info mr-5" onclick="vendorLoginModal()" data-toggle="modal">
                    Người cung cấp đăng nhập</a>
                <a href="#" class="btn btn-info" onclick="loginModal()" data-toggle="modal">
                    Người dùng đăng nhập</a>
            </div>
            @include('modals.login')
            @include('modals.vendor_login')
            @include('modals.login_error')
            <input type="hidden" id="loginPortal" value="{{ route('login_portal') }}">
            <input type="hidden" id="vendorLoginPortal" value="{{ route('vendor_login_portal') }}">
            <input type="hidden" id="validation" value="{{ json_encode(__('validation')) }}">
            <input type="hidden" id="message" value="{{ json_encode(__('message')) }}">
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            const VALIDATION = JSON.parse($('#validation').val());
            const MESSAGE = $('#message').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            function loginModal() {
                $('#loginModal').modal('show');
            }
            function vendorLoginModal() {
                $('#vendorLoginModal').modal('show');
                // validateFormLogin();
            }
            function loginUser() {
                let email = $('#emailLogin').val();
                let password = $('#passwordLogin').val();
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
                            let $modal = $('##modalErrorLogin');
                            // if (data.error_status) {
                            //     $modal = $('#inActiveAccount');
                            //     $modal.find('.httv-resend-mail-active').attr('data-href', data.resend_active_mail_href)
                            // }
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
            function vendorLoginUser() {
                let email = $('#emailVendorLogin').val();
                let password = $('#passwordVendorLogin').val();
                $.ajax({
                    url: $('#vendorLoginPortal').val(),
                    type: 'POST',
                    data: {
                        email: email,
                        password: password,
                    },
                    success: function (data) {
                        console.log(data)
                        if (data.status === true) {
                            location.reload();
                        } else {
                            $('#vendorLoginModal').modal('hide');
                            let $modal = $('#modalErrorLogin');
                            // if (data.error_status) {
                            //     $modal = $('#inActiveAccount');
                            //     $modal.find('.httv-resend-mail-active').attr('data-href', data.resend_active_mail_href)
                            // }
                            $modal.find('.message').text(data.message);
                            $('#modalErrorLogin').modal('show');
                        }
                    },
                    error: function (response) {
                        // console.log(response);
                        $('#vendorLoginModal').modal('hide');
                        $('#modalErrorSendEmail .message').text(response.responseJSON.errors.email);
                        $('#modalErrorSendEmail').modal('show');
                    }
                });
            }
            function validateFormLogin()
            {
                $("#vendorLoginModal").validate({
                    rules: {
                        emailLogin: {
                            required: true,
                            email: true,
                        },
                        passwordLogin: {
                            required: true,
                            minlength: 8,
                            maxlength: 50,
                        }
                    },
                    messages: {
                        emailLogin: {
                            required: VALIDATION.login_client.email.required,
                            email: VALIDATION.login_client.email.email,
                        },
                        passwordLogin: {
                            required: VALIDATION.login_client.password.required,
                            minlength: VALIDATION.login_client.password.min,
                            maxlength: VALIDATION.login_client.password.max,
                        }
                    },
                    errorPlacement: function ($error, $element) {
                        // let name = $element.attr("name");
                        console.log(1234)
                        $(".error").append($error);
                    }
                });
            }
            window.loginUser = loginUser;
            window.vendorLoginUser = vendorLoginUser;
            window.loginModal = loginModal;
            window.vendorLoginModal = vendorLoginModal;
        });

    </script>
@endsection

