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
                        <a href="{{ route('category.show', $category->id) }}" class="text-decoration-none"><img src="{{ $category->image }}" class="w-100 h-240">
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
                <h3 class="color-3aad92 my-5"><b>ĐỐI TÁC LIÊN KẾT</b></h3>
                <div class="your-class justify-content-around">
                    @foreach($vendors as $vendor)
                        @if (!empty($vendor->avatar))
                            <img src="{{ asset($vendor->avatar) }}" class="h-300 px-2">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.your-class').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                accessibility: true,
                autoplay: true,
                autoplaySpeed: 2000,
            });
        })
    </script>
@endsection
