@extends('admin.home')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-column">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Danh sách thể loại
                </h3>
                <span><a class="btn btn-info mb-2" href="{{ route('categories.create') }}">Thêm mới</a></span>
            </div>
        </div>
        <div class="card-body">
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
                <form action="{{ route('categories.index') }}" method ="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="search" class="form-control" placeholder="Tên thể loại" name="searchName">
                        </div>
                        <button class="btn-info btn" type="submit">Tìm kiếm</button>
                    </div>
                </form>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">{{ __('STT') }}</th>
                    <th scope="col">{{ __('Tên thể loại')}}</th>
                    <th scope="col">{{ __('Ảnh đại diện')}}</th>
                    <th scope="col">{{ __('Hành động') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $category->name }}</td>
                        <td class="w-384">
                            <img src="{{ asset("$category->image") }}" class="w-100 h-200">
                        </td>
                        <td class="d-flex flex-row justify-content-center">
                            <a class="btn btn-success mr-2" href="{{ route('categories.edit', $category->id) }}">Sửa</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                <div class="float-right mt-2">
                    {{ $categories->appends($_GET)->links() }}
                </div>
        </div>
    </div>
@endsection
