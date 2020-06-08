@extends('web.layouts.header')
@section('content')
    <div class="theme mt-5">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center color-3aad92"><b>CHỦ ĐỀ KHUYẾN MÃI</b></h3>
            </div>
        </div>
        <div class="row mt-2">
            @foreach($categories as $category)
                <div class="col-4">
                    <div class="img-box">
                        <a href="{{ route('category') }}" class="text-decoration-none"><img src="{{ $category->image }}" class="w-100 h-240">
                            <p class="text-white">{{ $category->name }}</p>
                        </a>
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
@endsection
