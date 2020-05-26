<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đăng ký</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="input-group">
                        <div class="row">
                            <div class="col-2">
                                <h5 class="col-form-label mr-2">Email:</h5>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control" name="email" placeholder="Nhập email">
                                @error('email')
                                <strong class="alert alert-danger"> {{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="row">
                            <div class="col-2">
                                <h5 class="col-form-label mr-2">Mật khẩu:</h5>
                            </div>
                            <div class="col-10">
                                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                                @error('password')
                                <strong class="alert alert-danger"> {{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="row">
                            <div class="col-2">
                                <h5 class="col-form-label mr-2">Xác nhận mật khẩu:</h5>
                            </div>
                            <div class="col-10">
                                <input type="password" class="form-control" name="confimPassword" placeholder="Nhập mật khẩu">
                                @error('confirmPassword')
                                <strong class="alert alert-danger"> {{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="row">
                            <div class="col-2">
                                <h5 class="col-form-label mr-2">Ngày sinh:</h5>
                            </div>
                            <div class="col-10">
                                <input type="date" class="form-control" name="birthday" placeholder="Nhập ngày sinh">
                                @error('birthday')
                                <strong class="alert alert-danger"> {{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="row">
                            <div class="col-2">
                                <h5 class="col-form-label mr-2">Số điện thoại:</h5>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại">
                                @error('phone')
                                <strong class="alert alert-danger"> {{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="row">
                            <div class="col-2">


                                <h5 class="col-form-label mr-2">Địa chỉ:</h5>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ">
                        @error('address')
                        <strong class="alert alert-danger"> {{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="input-group">
                        <h5 class="col-form-label mr-2">Giới tính:</h5>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender">Nam
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender">Nữ
                            </label>
                        </div>
                        @error('gender')
                        <strong class="alert alert-danger"> {{ $message }}</strong>
                        @enderror
                    </div>
                </form>
                <button type="button" class="btn btn-primary">Đăng nhập</button>
            </div>
        </div>
    </div>
</div>

