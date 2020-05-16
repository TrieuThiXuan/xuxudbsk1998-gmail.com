@extends('admin.home')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Danh sách người dùng
            </h3>
        </div>
        <div class="card-body">
            <span><a class="btn btn-info mb-2" href="{{ route('users.create') }}">Thêm mới</a></span>
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br/>
            @endif
            @if(session()->get('alert'))
                <div class="alert alert-danger">
                    {{ session()->get('alert') }}
                </div><br/>
            @endif
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">{{ __('STT') }}</th>
                    <th scope="col">{{ __('Họ và tên') }}</th>
                    <th scope="col">{{ __('Ngày sinh') }}</th>
                    <th scope="col">{{ __('Giới tính') }}</th>
                    <th scope="col">{{ __('Địa chỉ') }}</th>
                    <th scope="col">{{ __('Quyền') }}</th>
                    <th scope="col">{{ __('Hành động') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->birthday }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>
                        @foreach(\App\User::ROLE as $key => $value)
                          @if($key == $user->role) {{ $value }} @endif
                        @endforeach
                    </td>
                    <td class="d-flex flex-row">
                        <a class="btn btn-success mr-2" href="{{ route('users.edit', $user->id) }}">Sửa</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
