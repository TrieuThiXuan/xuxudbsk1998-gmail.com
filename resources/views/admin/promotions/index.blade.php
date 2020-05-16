@extends('admin.home')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Danh sách khuyến mãi
            </h3>
        </div>
        <div class="card-body">
            <span><a class="btn btn-info mb-2" href="{{ route('promotions.create') }}">Thêm mới</a></span>
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
                    <th scope="col">{{ __('Tên chương trình') }}</th>
                    <th scope="col">{{ __('Tóm tắt') }}</th>
                    <th scope="col">{{ __('Thời gian bắt đầu') }}</th>
                    <th scope="col">{{ __('Thời gian kết thúc') }}</th>
                    <th scope="col">{{ __('Thể loại') }}</th>
                    <th scope="col">{{ __('Trạng thái bài đăng') }}</th>
                    <th scope="col">{{ __('Hình ảnh') }}</th>
                    <th scope="col">{{ __('Hành động') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($promotions as $promotion)
                    <tr>
                        <th scope="row">{{ $promotion->id }}</th>
                        <td><a href="{{ route('users.show', $promotion->id) }}">{{ $promotion->name }}</a></td>
                        <td>{{ $promotion->summary }}</td>
                        <td>{{ $promotion->began_at }}</td>
                        <td>{{ $promotion->finished_at }}</td>
                        <td>{{ $promotion->category->name }}</td>
                        <td>
                            @foreach(\App\Promotion::STATUS as $key => $value)
                                @if($key == $promotion->status) {{ $value }} @else '' @endif
                            @endforeach
                        </td>
                        <td><img src="{{ asset("$promotion->image") }}"></td>
                        <td class="d-flex flex-row">
                            <a class="btn btn-success mr-2" href="{{ route('users.edit', $promotion->id) }}">Sửa</a>
                            <form action="{{ route('users.destroy', $promotion->id) }}" method="POST">
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
