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
                        <button class="btn btn-info" type="submit">Tìm kiếm</button>
                    </div>
                </form>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">{{ __('STT') }}</th>
                    <th scope="col">{{ __('Tên chương trình') }}</th>
                    <th scope="col">{{ __('Nhà cung cấp') }}</th>
                    <th scope="col">{{ __('Thời gian bắt đầu') }}</th>
                    <th scope="col">{{ __('Thời gian kết thúc') }}</th>
                    <th scope="col">{{ __('Thể loại') }}</th>
                    <th scope="col">{{ __('Lượt nhận') }}</th>
                </tr>
                </thead>
                <tbody>
                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                    @foreach($promotions as $promotion)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href="{{ route('users.show', $promotion->id) }}">{{ $promotion->name }}</a></td>
                            <td>{{ $promotion->isVendor->name }}</td>
                            <td>{{ $promotion->began_at }}</td>
                            <td>{{ $promotion->finished_at }}</td>
                            <td>{{ $promotion->category->name }}</td>
                        </tr>
                    @endforeach
                @else
                    @foreach($promotions_vendor as $promotion_vendor)
                        <tr>
                            <th scope="row">{{ $promotion_vendor->id }}</th>
                            <td><a href="{{ route('users.show', $promotion_vendor->id) }}">{{ $promotion_vendor->name }}</a></td>
                            <td>{{ $promotion_vendor->isVendor->name }}</td>
                            <td>{{ $promotion_vendor->began_at }}</td>
                            <td>{{ $promotion_vendor->finished_at }}</td>
                            <td>{{ $promotion_vendor->category->name }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection


