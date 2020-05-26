@extends('web.layouts.header')
@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <h3>{{ $promotion->name }}</h3>
                    <p>{{ $promotion->created_at }}</p>
                    <p>{{ $promotion->summary }}</p>
                    <img src="{{ asset("$promotion->image") }}" class="w-100">
                    <p>{{ $promotion->content }}</p>
                    <p>{{$promotion->began_at}}</p>
                    <p>{{$promotion->finished_at}}</p>
                    <button class="btn btn-warning">Yêu thích</button>
                    <button class="btn btn-info">Nhận thông báo</button>
                </div>
            </div>
        </div>
    </div>
@endsection
