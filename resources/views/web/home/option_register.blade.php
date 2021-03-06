@extends('web.layouts.header')
@section('content')
    @include('web.layouts.slider')
    <div class="content mb-5">
        <div class="container">
            <div class="h-240 d-flex justify-content-center align-items-center">
                <a href="#" class="btn btn-info mr-5" onclick="vendorRegisterModal()" data-toggle="modal">
                    Người cung cấp đăng ký</a>
                <a href="#" class="btn btn-info" onclick="registerModal()" data-toggle="modal">
                    Người dùng đăng ký</a>
            </div>
            @include('modals.register')
            @include('modals.vendor_register')
            @include('modals.send_error')
            @include('modals.active')
            <input type="hidden" id="registerPortal" value="{{ route('register_portal') }}">
            <input type="hidden" id="vendorRegisterPortal" value="{{ route('vendor_register_portal') }}">
            <input type="hidden" id="activeCodeUrl" value="{{ route('active_user') }}">
        </div>
    </div>
@endsection
@section('script')
<script>
    function registerModal() {
        $('#registerModal').modal('show');

    };
    function vendorRegisterModal() {
        $('#vendorRegisterModal').modal('show');
    }
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function registerUser()
        {
            let email = $('#emailRegister').val();
            let password = $('#passwordRegister').val();
            let confirmPassword = $('#confirmPasswordRegister').val();
            let birthday = $('#birthdayRegister').val();
            let phone = $('#phoneRegister').val();
            let address = $('#addressRegister').val();
            let gender = $('#genderRegister').val();
            let url = $('#activeCodeUrl').val();
            $.ajax({
                url: $('#registerPortal').val(),
                type: 'POST',
                data: {
                    email: email,
                    password: password,
                    confirmPassword: confirmPassword,
                    url: url,
                },
                success: function (data) {
                    if (data.status === true) {
                        $('#registerModal').modal('hide');
                        $('#activeAccount').modal('show');
                    }
                },
                error: function (response) {
                    console.log(response)
                    $('#registerModal').modal('hide');
                    $('#modalErrorSendEmail .message').text(response.responseJSON.message);
                    $('#modalErrorSendEmail').modal('show');
                }
            });
        }
        function vendorRegisterUser()
        {
            let email = $('#vendorEmailRegister').val();
            let password = $('#vendorPasswordRegister').val();
            let passwordConfirm = $('#vendorConfirmPasswordRegister').val();
            let name = $('#vendorNameRegister').val();
            let phone = $('#vendorPhoneRegister').val();
            $.ajax({
                url: $('#vendorRegisterPortal').val(),
                type: 'POST',
                data: {
                    email: email,
                    password: password,
                    passwordConfirm: passwordConfirm,
                    name: name,
                    phone: phone,
                },
                success: function (data) {
                    if (data.status === true) {
                        $('#vendorRegisterModal').modal('hide');
                        $('#activeAccount').modal('show');
                    }
                },
                error: function (response) {
                    $('#vendorRegisterModal').modal('hide');
                    $('#modalErrorSendEmail .message').text(response.responseJSON.errors.email);
                    $('#modalErrorSendEmail').modal('show');
                }
            });
        }
        window.registerUser = registerUser;
        window.vendorRegisterUser = vendorRegisterUser;
    })
</script>
@endsection
