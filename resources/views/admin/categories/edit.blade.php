@extends('admin.home')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Cập nhật thể loại
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <lable>Tên thể loại</lable>
                    <input type="text" name="name" placeholder="Tên thể loại" class="form-control" value="{{ old('name', $category->name) }}">
                    @error('name')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Ảnh đại diện</lable>
                    <input type="file" name="image" placeholder="Ảnh đại diện" class="form-control" value="{{ old('image', $category->image) }}">
                    @error('image')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
