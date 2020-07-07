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
                <form enctype="multipart/form-data" id="registerUser">
                    <div class="form-group">
                        <label class="col-form-label">Email:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="email" placeholder="Nhập email" id ="emailRegister">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @error('email')
                        <strong class="alert alert-danger"> {{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Mật khẩu:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" id="passwordRegister">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @error('password')
                        <strong class="alert alert-danger"> {{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label mr-2">Xác nhận mật khẩu:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="confirmPassword" placeholder="Xác nhận mật khẩu" id="confirmPasswordRegister">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @error('confirmPassword')
                        <strong class="alert alert-danger"> {{ $message }}</strong>
                        @enderror
                    </div>
                </form>
                <button type="submit" class="btn btn-primary" onclick="registerUser()">Đăng ký</button>
            </div>
        </div>
    </div>
</div>

