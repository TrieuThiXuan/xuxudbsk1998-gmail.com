@extends('admin.home')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Cập nhật chương trình khuyến mãi
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('promotions.update', $promotion->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <lable>Tên chương trình</lable>
                    <input type="text" name="name" placeholder="Tên chương trình" class="form-control"
                           value="{{ old('name', $promotion->name) }}">
                    @error('name')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Tóm tắt</lable>
                    <input type="summary" name="summary" placeholder="Tóm tắt" class="form-control"
                           value="{{ old('summary', $promotion->summary) }}">
                    @error('summary')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Nội dung</lable>
                    <input type="text" name="content" placeholder="Nội dung" class="form-control" value="{{ old('content', $promotion->content) }}">
                    @error('content')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Thời gian bắt đầu</lable>
                    <input type="date" name="began_at" placeholder="Thời gian bắt đầu" class="form-control" value="{{ old('began_at', $promotion->began_at) }}">
                    @error('began_at')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Thời gian kết thúc</lable>
                    <input type="date" name="finished_at" placeholder="Thời gian kết thúc" class="form-control" value="{{ old('finished_at', $promotion->finished_at) }}">
                    @error('finished_at')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Hình ảnh</lable>
                    <input type="file" name="image" placeholder="Hình ảnh" class="form-control" value="{{ old('image') }}">
                    @error('image')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Địa điểm</lable>
                    <input type="text" name="address" placeholder="address" class="form-control" value="{{ old('address', $promotion->address) }}">
                    @error('address')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Thể loại</lable>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Người cung cấp</lable>
                    <select class="form-control" name="vendor_id">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Thêm mới</button>
            </form>
        </div>
    </div>
@endsection
