@extends('web.layouts.header')
@section('content')
<div class="container">
    <div class="slider d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-12">
                <input class="" placeholder="Tìm kiếm">
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <select class="form-control">
                    <option value="1">Thể loại</option>
                    <option value="1">1</option>
                </select>
            </div>
            <div class="col-4">
                <select class="form-control">
                    <option value="1">Ví điện tử</option>
                    <option value="1">Thẻ ngân hàng</option>
                </select>
            </div>
            <div class="col-4">
                <select class="form-control">
                    <option value="1">Địa điểm</option>
                    <option value="1">1</option>
                </select>
            </div>
        </div></div>
    <div class="content">
        <div class="theme">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">Chủ đề khuyến mãi</h3>
                </div>
            </div>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-4">
                        <div class="img-box">
                            <a href="{{ route('category') }}"><img src="{{ $category->image }}" class="w-100 h-240">
                                <p>{{ $category->name }}</p></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="vendor text-center mt-5">
            <div class="row">
                <div class="col-12">
                    <h3>Đối tác liên kết</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
