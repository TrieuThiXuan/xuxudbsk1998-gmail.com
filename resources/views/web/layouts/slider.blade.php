@extends('web.layouts.header')
@section('slider')
<div class="slider">
    <div class="container">
        <div class="slider d-flex flex-column align-items-center justify-content-center">
            <div class="input-search mb-4">
                <div class="row">
                    <div class="col-12">
                        <input name="search" class="form-control" placeholder="Tìm kiếm">
                    </div>
                </div>
            </div>
            <div class="mutil-input-search">
                 <div class="row">
                     <div class="col-4">
                         <select class="form-control">
                             <option value="1">Thể loại</option>
                             <option class="1">1</option>
                         </select>
                     </div>
                     <div class="col-4">
                         <select class="form-control">
                             <option value="1">Ví điện tử</option>
                             <option class="2">Thẻ ngân hàng</option>
                         </select>
                     </div>
                     <div class="col-4">
                         <select class="form-control">
                             <option value="1">Địa điểm</option>
                             <option class="1">Hà Nội</option>
                             <option class="1">Hồ Chí Minh</option>
                         </select>
                     </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection