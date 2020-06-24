@extends('web.layouts.header')
@section('content')
    <div class="show-content mt-5">
        <div class="row">
            <div class="col-12">
                <h3>{{ $promotion->name }}</h3>
                <p class="font-created">{{ $promotion->created_at }}</p>
                <p>{{ $promotion->summary }}</p>
                <img src="{{ asset("$promotion->image") }}" class="w-100">
                <p>{!!  $promotion->content !!}</p>
                <p>Thời gian bắt đầu: {{$promotion->began_at}}</p>
                <p>Thời gian kết thúc: {{$promotion->finished_at}}</p>
                <button class="btn btn-warning">Yêu thích</button>
                <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Nhận thông báo</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('cla_store') }}" method="POST" id="storeCalender">
                        @csrf
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- <input type="text" placeholder="Thêm tiêu đề" class="form-control" name="title"> -->
                        <div>
                        <label>Thông báo</label>
                            <!-- <i class="fa fa-user-clock"></i> -->
                            <div class="input-group">
                            <input type="date" class="form-control" name="time" id="timeDate">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flext-row mt-5">
                        <input type="checkbox" class="mt-2 mr-3">
                        <select class="form-control">
                        <option>Không lặp lại</option>
                        <option>Vào thứ 2 hàng tuần</option>
                        </select>
                        </div>
                
                        </div>
                        <input type="hidden" value="{{ $promotion->name }}" name="name">
                        <input type="hidden" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}" name="email">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="{{ $promotion->name }}" name="name">
    <input type="hidden" value="{{ \Illuminate\Support\Facades\Auth::user()->email ?  \Illuminate\Support\Facades\Auth::user()->email : ''}}" name="email">
@endsection
<script>
    $('#storeCalender').submit(function () {
        let name = $('input[name=name]').val();
        let email = $('input[name=email]').val();
        $.ajax({
            url: {{ route('cla_store') }},
            type: 'POST',
            data: {
                name: name,
                email: email,
            },
            success: function (data) {
                if (data.status === true) {
                    location.reload();
                } else {
                    $('#loginModal').modal('hide');
                    let $modal = $('#modalErrorSendEmail');
                    if (data.error_status) {
                        $modal = $('#inActiveAccount');
                        $modal.find('.httv-resend-mail-active').attr('data-href', data.resend_active_mail_href)
                    }
                    $modal.find('.message').text(data.message);
                    $modal.modal('show');
                }
            },
            error: function (error) {
                alert(error);
                $('#loginModal').modal('hide');
                $('#modalErrorSendEmail .message').text(MESSAGE.error_global);
                $('#modalErrorSendEmail').modal('show');
            }
        });
    });
</script>
