@extends('admin.home')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-column">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Danh sách khuyến mãi
                </h3>
                <span><a class="btn btn-info mb-2" href="{{ route('promotions.create') }}">Thêm mới</a></span>
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
                <div class="input-search">
                    <form action="{{ route('promotions.index') }}" method="GET">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <input type="search" placeholder="Tên chương trình" name="searchName" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="searchCategory">
                                    <option></option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="searchStatus">
                                    <option></option>
                                    @foreach(\App\Promotion::STATUS as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-info" type="submit">Tìm kiếm</button>
                                <a class="btn btn-warning" href="{{ route('promotions.approve.all') }}">Duyệt tất cả</a>
                            </div>
                        </div>
                    </form>
                </div>
                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">{{ __('STT') }}</th>
                    <th scope="col">{{ __('Tên chương trình') }}</th>
                    <th scope="col">{{ __('Nhà cung cấp') }}</th>
                    <th scope="col">{{ __('Thời gian bắt đầu') }}</th>
                    <th scope="col">{{ __('Thời gian kết thúc') }}</th>
                    <th scope="col">{{ __('Thể loại') }}</th>
                    <th scope="col">{{ __('Trạng thái bài đăng') }}</th>
                    <th scope="col">{{ __('Hình ảnh') }}</th>
                    <th scope="col">{{ __('Hành động') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($promotions_normal as $promotion_normal)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><a href="{{ route('users.show', $promotion_normal) }}">{{ $promotion_normal->name }}</a></td>
                        <td>{{ $promotion_normal->isVendor->name }}</td>
                        <td>{{ $promotion_normal->began_at }}</td>
                        <td>{{ $promotion_normal->finished_at }}</td>
                        <td>{{ $promotion_normal->category->name ?? '' }}</td>
                        <td>
                            @foreach(\App\Promotion::STATUS as $key => $value)
                                {{$key == $promotion_normal->status ?  $value : ''}}
                            @endforeach
                        </td>
                        <td><img src="{{ asset("$promotion_normal->image") }}" class="w-100"></td>
                        <td class="d-flex flex-row">
                            @if($promotion_normal->status == \App\Promotion::PENDING)
                            <a class="btn btn-warning mr-2" href="{{ route('promotions.approve', $promotion_normal->id) }}">Duyệt</a>
                            @endif
                            <a class="btn btn-success mr-2" href="{{ route('promotions.edit', $promotion_normal->id) }}">Sửa</a>
                            <form action="{{ route('promotions.destroy', $promotion_normal->id) }}" method="POST">
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
                        {{ $promotions_normal->appends($_GET)->links() }}
                    </div>
        </div>
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">{{ __('STT') }}</th>
                                <th scope="col">{{ __('Tên chương trình') }}</th>
                                <th scope="col">{{ __('Nhà cung cấp') }}</th>
                                <th scope="col">{{ __('Thời gian bắt đầu') }}</th>
                                <th scope="col">{{ __('Thời gian kết thúc') }}</th>
                                <th scope="col">{{ __('Thể loại') }}</th>
                                <th scope="col">{{ __('Trạng thái bài đăng') }}</th>
                                <th scope="col">{{ __('Hình ảnh') }}</th>
                                <th scope="col">{{ __('Hành động') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                    @foreach($promotions_vendor as $promotion_vendor)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href="{{ route('users.show', $promotion_vendor->id) }}">{{ $promotion_vendor->name }}</a></td>
                            <td>{{ $promotion_vendor->isVendor->name }}</td>
                            <td>{{ $promotion_vendor->began_at }}</td>
                            <td>{{ $promotion_vendor->finished_at }}</td>
                            <td>{{ $promotion_vendor->category->name ?? '' }}</td>
                            <td>
                                @foreach(\App\Promotion::STATUS as $key => $value)
                                    {{$key == $promotion_vendor->status ?  $value : ''}}
                                @endforeach
                            </td>
                            <td><img src="{{ asset("$promotion_vendor->image") }}" class="w-100"></td>
                            <td class="d-flex flex-row">
                                <a class="btn btn-warning mr-2" href="{{ route('promotions.approve', $promotion_vendor->id) }}">Duyệt</a>
                                <a class="btn btn-success mr-2" href="{{ route('promotions.edit', $promotion_vendor->id) }}">Sửa</a>
                                <form action="{{ route('promotions.destroy', $promotion_vendor->id) }}" method="POST">
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
{{--                {{ $promotions_vendor->appends($_GET)->links() }}--}}
            </div>
    </div>
                    @endif

    </div>
@endsection

