@extends('admin.home')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Thêm mới chương trình khuyến mãi
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('promotions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <lable>Tên chương trình</lable>
                    <input type="text" name="name" placeholder="Tên chương trình" class="form-control" value="{{ old('name') }}">
                    @error('name')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Tóm tắt</lable>
                    <input type="summary" name="summary" placeholder="Tóm tắt" class="form-control" value="{{ old('summary') }}">
                    @error('summary')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Nội dung</lable>
                    <textarea  name="content" placeholder="Nội dung" class="form-control" id="editor1">
                         {{ old('content') }}
                    </textarea>
                    @error('content')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Thời gian bắt đầu</lable>
                    <input name="began_at" placeholder="Thời gian bắt đầu" class="form-control datepicker" value="{{ old('began_at') }}">
                    @error('began_at')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Thời gian kết thúc</lable>
                    <input name="finished_at" placeholder="Thời gian kết thúc" class="form-control datepicker" value="{{ old('finished_at') }}">
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
                    <input type="text" name="address" placeholder="Địa điểm" class="form-control" value="{{ old('address') }}">
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
                <div class="form-group">
                    <lable>Trạng thái bài đăng</lable>
                    @foreach(\App\Promotion::STATUS as $key => $value)
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" value="{{ $key }}" {{ old('status') ==$key ? 'checked' : ''}}>{{ $value }}
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="input-group d-flex flex-column">
                    <lable>Loại khuyến mãi</lable>
                    <div class="input-group">
                        <div class="form-group mr-5">
                            <select class="form-control" name="category_promotion_id">
                                @foreach($statusPromotions as $statusPromotion)
                                    <option value="{{ $statusPromotion->id }}" {{ old('category_promotion_id') == $statusPromotion->id ? 'selected' : '' }}>{{ $statusPromotion->name }}</option>
                                @endforeach
                            </select>
                            @error('category_promotion_id')
                            <strong class="text-danger"> {{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="d-flex flex-row">
                            <lable class="mr-2 mt-1">Giảm</lable>
                            <div class="form-group">
                                <input type="text" name="discount" placeholder="giảm giá" class="form-control" value="{{ old('discount') }}">
                                @error('discount')
                                <strong class="text-danger"> {{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <lable>Ưu tiên</lable>
                    <input type="text" name="priority" placeholder="Ưu tiên" class="form-control" value="{{ old('priority') }}">
                    @error('priority')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Thêm mới</button>
            </form>
        </div>
    </div>
@endsection
