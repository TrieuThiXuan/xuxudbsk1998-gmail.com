@extends('admin.home')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Thêm mới người dùng
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <lable>Họ và tên</lable>
                    <input type="text" name="name" placeholder="Họ và tên" class="form-control" value="{{ old('name') }}">
                    @error('name')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Password</lable>
                    <input type="password" name="password" placeholder="Password" class="form-control" value="{{ old('password') }}">
                    @error('password')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Ngày sinh</lable>
                    <input type="date" name="birthday" placeholder="Ngày sinh" class="form-control" value="{{ old('birthday') }}">
                    @error('birthday')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Email</lable>
                    <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                    @error('email')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Giới tính</lable>
                    <select class="form-control" name="gender">
                        @foreach(\App\User::GENDER as $key => $value)
                            <option value="{{ $key }}" {{ old('gender') == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('gender')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Số điện thoại</lable>
                    <input type="text" name="phone" placeholder="phone" class="form-control" value="{{ old('phone') }}">
                    @error('phone')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Địa chỉ</lable>
                    <input type="text" name="address" placeholder="address" class="form-control" value="{{ old('address') }}">
                    @error('address')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Quyền</lable>
                   <select class="form-control" name="role">
                       @foreach(\App\User::ROLE as $key => $value)
                            <option value="{{ $key }}" {{ old('role') == $key ? 'selected' : '' }}>{{ $value }}</option>
                       @endforeach
                   </select>
                    @error('role')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Thêm mới</button>
            </form>
        </div>
    </div>
@endsection
