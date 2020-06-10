@extends('web.layouts.header')
@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div>
                        <a href="#" class="btn btn-info" onclick="vendorRegisterModal()" data-toggle="modal">
                            Người cung cấp đăng ký</a>
                        <a href="#" class="btn btn-info" onclick="registerModal()" data-toggle="modal">
                            Người dùng đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.register')
    @include('modals.vendor_register')
    <input type="hidden" id="registerPortal" value="{{ route('register_portal') }}">
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
            let passwordConfirm = $('#passwordConfirmRegister').val();
            let birthday = $('#birthdayRegister').val();
            let phone = $('#phoneRegister').val();
            let address = $('#addressRegister').val();
            let gender = $('#genderRegister').val();
            console.log($('#emailRegister').val());
            $.ajax({
                url: $('#registerPortal').val(),
                type: 'POST',
                data: {
                    email: email,
                    password: password,
                    passwordConfirm: passwordConfirm,
                    birthday: birthday,
                    phone: phone,
                    address: address,
                    gender: gender
                },
                success: function (data) {
                    if (data.status === true) {
                        $('#registerModal').modal('hide');
                        $('#activeAccount').modal('show');
                    }
                },
                error: function (response) {
                    $('#registerModal').modal('hide');
                    $('#modalErrorSendEmail .message').text(response.responseJSON.errors.email);
                    $('#modalErrorSendEmail').modal('show');
                }
            });
        }
        window.registerUser = registerUser;
    })
</script>
@endsection
