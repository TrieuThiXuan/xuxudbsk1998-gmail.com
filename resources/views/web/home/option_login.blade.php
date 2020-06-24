@extends('web.layouts.header')
@section('content')
    <div class="h-240 d-flex justify-content-center align-items-center">
        <a href="#" class="btn btn-info mr-5" onclick="vendorLoginModal()" data-toggle="modal">
            Người cung cấp đăng nhập</a>
        <a href="#" class="btn btn-info" onclick="loginModal()" data-toggle="modal">
            Người dùng đăng nhập</a>
    </div>
    @include('modals.login')
    @include('modals.vendor_login')
    <input type="hidden" id="loginPortal" value="{{ route('login_portal') }}">
    <input type="hidden" id="vendorLoginPortal" value="{{ route('vendor_login_portal') }}">
@endsection
@section('script')
    <script>
        function loginModal() {
            $('#loginModal').modal('show');
        }
        function vendorLoginModal() {
            $('#vendorLoginModal').modal('show');
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
                        // $('#loginModal').modal('hide');
                        // $('#modalErrorSendEmail .message').text(MESSAGE.error_global);
                        // $('#modalErrorSendEmail').modal('show');
                    }
                });
            }
            window.loginUser = loginUser;
            window.vendorLoginUser = vendorLoginUser;
        });
    </script>
@endsection

