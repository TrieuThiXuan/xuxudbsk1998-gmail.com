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
                <form id="registerUser">
                    <div class="input-group">
                        <div class="row">
                            <div class="col-2">
                                <h5 class="col-form-label mr-2">Email:</h5>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control" name="email" placeholder="Nhập email" id ="emailRegister">
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
                                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" id="passwordRegister">
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
                                <input type="password" class="form-control" name="confirmPassword" placeholder="Nhập mật khẩu" id="confirmPasswordRegister">
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
                                <input type="date" class="form-control" name="birthday" placeholder="Nhập ngày sinh" id="birthdayRegister">
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
                                <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" id ="phoneRegister">
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
                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" id="addressRegister">
                        @error('address')
                        <strong class="alert alert-danger"> {{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="input-group">
                        <h5 class="col-form-label mr-2">Giới tính:</h5>
                        @foreach(\App\User::GENDER as $key => $value)
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="{{  $key }}" id="genderRegister">{{ $value }}
                            </label>
                        </div>
                        @endforeach
                        @error('gender')
                        <strong class="alert alert-danger"> {{ $message }}</strong>
                        @enderror
                    </div>
                </form>
                <button type="submit" class="btn btn-primary" onclick="registerUser()">Đăng ký</button>
            </div>
        </div>
    </div>
</div>

