@extends('admin.home')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Cập nhật người dùng
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <lable>Họ và tên</lable>
                    <input type="text" name="name" placeholder="Họ và tên" class="form-control" value="{{ old('name', $user->name) }}">
                    @error('name')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Email</lable>
                    <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email', $user->email) }}">
                    @error('email')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Giới tính</lable>
                    <select class="form-control" name="gender">
                        @foreach(\App\User::GENDER as $key => $value)
                            <option value="{{ $key }}" {{ old('gender', $user->gender) == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('gender')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Ngày sinh</lable>
                    <input name="birthday" placeholder="Ngày sinh" class="form-control datepicker" value="{{ old('birthday', $user->birthday) }}">
                    @error('birthday')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Số điện thoại</lable>
                    <input type="text" name="phone" placeholder="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                    @error('phone')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Địa chỉ</lable>
                    <input type="text" name="address" placeholder="address" class="form-control" value="{{ old('address', $user->address) }}">
                    @error('address')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Quyền</lable>
                    <select class="form-control" name="role">
                        @foreach(\App\User::ROLE as $key => $value)
                            <option value="{{ $key }}" {{ old('role', $user->role) == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('role')
                    <strong class="alert alert-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
