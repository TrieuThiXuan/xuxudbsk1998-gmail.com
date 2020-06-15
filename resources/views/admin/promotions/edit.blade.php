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
                    <textarea name="content" placeholder="Nội dung" class="form-control" id="editor2">
                    {{ old('content', $promotion->content)}}
                    </textarea>
                    @error('content')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Thời gian bắt đầu</lable>
                    <input name="began_at" placeholder="Thời gian bắt đầu" class="form-control datepicker" value="{{ old('began_at', $promotion->began_at) }}">
                    @error('began_at')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Thời gian kết thúc</lable>
                    <input name="finished_at" placeholder="Thời gian kết thúc" class="form-control datepicker" value="{{ old('finished_at', $promotion->finished_at) }}">
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
                    <input type="text" name="address" placeholder="Địa điểm" class="form-control" value="{{ old('address', $promotion->address) }}">
                    @error('address')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Thể loại</lable>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $promotion->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                            <option value="{{ $user->id }}" {{ old('vendor_id', $promotion->vendor_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('vendor_id')
                    <strong class="text-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <lable>Trạng thái bài đăng</lable>
                    @if (\Illuminate\Support\Facades\Auth::user()->isAdmin())
                    @foreach(\App\Promotion::STATUS as $key => $value)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" value="{{ $key }}" {{ old('status', $promotion->status) ==$key ? 'checked' : ''}}>{{ $value }}
                            </label>
                        </div>
                    @endforeach
                    @else
                        @if($promotion->status == \App\Promotion::PENDING)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" value="{{ \App\Promotion::PENDING }}" {{ old('status', $promotion->status) == \App\Promotion::PENDING ? 'checked' : ''}}>Chờ duyệt
                                </label>
                            </div>
                        @endif
                            @if($promotion->status == \App\Promotion::APPROVE || $promotion->status == \App\Promotion::PUBLISH)
                            @foreach(\App\Promotion::OTHER_STATUS as $key => $value)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" value="{{ $key }}" {{ old('status', $promotion->status) == $key ? 'checked' : ''}}>{{ $value }}
                                    </label>
                                </div>
                            @endforeach
                            @endif
                    @endif
                </div>
                <button class="btn btn-success" type="submit">Thêm mới</button>
            </form>
        </div>
    </div>
@endsection
