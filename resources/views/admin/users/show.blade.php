@extends('admin.home')
@section('content')
    <div class="row">
       <div class="col-12">
           <div class="d-flex flex-row">
               <h5 class="mr-2">Tên người dùng:</h5>
               <p> {{ $user->name }}</p>
           </div>
           <table class="table">
               <thead>
               <tr>
                   <th scope="col">{{ __('STT') }}</th>
                   <th scope="col">{{ __('Tên chương trình')}}</th>
                   <th scope="col">{{ __('Nhận thông báo')}}</th>
                   <th scope="col">{{ __('Giới tính')}}</th>
                   <th scope="col">{{ __('Yêu thích') }}</th>
               </tr>
               </thead>
               <tbody>
               </tbody>
           </table>
       </div>
    </div>
@endsection()
