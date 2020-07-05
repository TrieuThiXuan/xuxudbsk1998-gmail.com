@extends('web.layouts.header')
@section('content')
    @include('web.layouts.slider')
    <div class="content mb-5">
        <div class="container">
            <div class="category-content mt-5">
                <div class="row">
                    <div class="col-3">
                        <div class="list-group">
                            <a href="#" class="list-group-item b-3aad92 color-white category-title">
                                Danh mục
                            </a>
                            @foreach($categories as $category)
                                <div class="aaa">
                                    <a href="{{ route('category.show', $category->id) }}" class="list-group-item list-group-item-action">{{ $category->name }}</a>
                                </div>
                            @endforeach
                        </div>
                        <div class="list-group mt-5">
                            <a href="#" class="list-group-item b-3aad92 color-white category-title">
                                Loại khuyến mãi
                            </a>
                            @foreach($statusPromotions as $statusPromotion)
                                <div class="aaa">
                                    <a href="{{ route('discount.show', $statusPromotion->id) }}" class="list-group-item list-group-item-action">{{ $statusPromotion->name }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <span><a href="{{ route('all.promotion') }}" class="news">Tất cả</a></span>
                                <span><a href="{{ route('priority') }}" class="news">Nổi bật</a></span>
                                <span><a href="{{ route('newest.promotion') }}" class="news">Mới nhất</a></span>
                                <span><a href="{{ route('discount.promotion') }}" class="news">Giảm giá nhiều</a></span>
                            </div>
                            @foreach($promotions as $promotion)
                                <div class="col-6">
                                    <div class="article">
                                        <img src="{{ asset($promotion->image) }}" class="w-100">
                                        <a href="{{ route('promotion.show', $promotion->id) }}">
                                            <h3>{{ $promotion->name }}</h3>
                                        </a>
                                        <p>{{ $promotion->summary }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
     $(document).ready(function () {
         let url = window.location;
         console.log(url)
         $('.aaa a').filter(function () {
             return this.href == url;
         }).css("background-color", "#3aad92");
         $('.news').filter(function () {
             return this.href == url;
         }).css("background-color", "#3aad92");
     });
    </script>
@endsection()
