@extends('admin.home')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Thêm mới thể loại khuyến mãi
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('category_promotion.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <lable>Tên thể loại khuyến mãi</lable>
                    <input type="text" name="name" placeholder="Tên thể loại khuyến mãi" class="form-control" value="{{ old('name') }}">
                    @error('name')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Thêm mới</button>
            </form>
        </div>
    </div>
@endsection
