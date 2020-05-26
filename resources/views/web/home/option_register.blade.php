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
@endsection
<script>
    function registerModal() {
         $('#registerModal').modal('show');
    }
    function vendorRegisterModal() {
          $('#vendorRegisterModal').modal('show');
    }
</script>
