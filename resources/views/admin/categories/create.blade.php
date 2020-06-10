@extends('admin.home')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Thêm mới thể loại
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <lable>Tên thể loại</lable>
                    <input type="text" name="name" placeholder="Tên thể loại" class="form-control" value="{{ old('name') }}">
                    @error('name')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Ảnh đại diện</lable>
                    <input type="file" name="image" placeholder="Ảnh đại diện" class="form-control" value="{{ old('image') }}">
                    @error('image')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Thêm mới</button>
            </form>
        </div>
    </div>
@endsection
