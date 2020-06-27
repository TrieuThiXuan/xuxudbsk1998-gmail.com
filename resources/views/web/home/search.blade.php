@extends('web.layouts.header')
@section('content')
    @include('web.layouts.slider')
    <div class="content mb-5">
        <div class="container">
            <div class="mt-5">
                <div class="row">
                    @if(isset($message))
                        <div class="col-12 text-center">
                            {{ $message }}
                        </div>
                    @else
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
