@extends('web.layouts.header')
@section('content')
<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Danh mục
                    </a>
                    @foreach($categories as $category)
                    <a href="#" class="list-group-item list-group-item-action">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-9">
                <div class="row">
                    @foreach($promotions as $promotion)
                    <div class="col-6">
                        <div class="article">
                            <img src="{{ $promotion->image }}" class="w-100">
                            <a href="{{ route('promotion.show', $promotion->id) }}">
                                <h3>{{ $promotion->name }}</h3>
                            </a>
                            <p>{{ $promotion->content }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
