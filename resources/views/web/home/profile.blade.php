@extends('web.layouts.header')
@section('content')
    @include('web.layouts.slider')
    <div class="content mb-5">
        <div class="container">
            <div class="row mt-5">
                <div class="col-6 justify-content-center align-items-center offset-3">
                    <a href="#"><i>Danh sách đã nhận thông báo</i></a>
                    <div class="align-items-center">
                        <form action="{{ route('update_avatar_profile', $vendor->id )}}" method ="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <div class="form-group">
                                    <lable>Thông tin Công ty, tổ chức</lable>
                                    <input type="text" name="name" placeholder="Họ và tên" class="form-control" value="{{ old('name', $vendor->name) }}">
                                    @error('name')
                                    <strong class="text-danger"> {{ $message }}</strong>
                                    @enderror
                                </div>
                                <label class="col-form-label">Ảnh đại diện:</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="avatar" placeholder="avatar" id="avatar" value="{{ old('avatar', $vendor->avatar) }}">
                                </div>
                                @error('avatar')
                                <strong class="alert alert-danger"> {{ $message }}</strong>
                                @enderror
                            </div>
                            <button class="btn btn-info" type="submit">Cập nhật</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
