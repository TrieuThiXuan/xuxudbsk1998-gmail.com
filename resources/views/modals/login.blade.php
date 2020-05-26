<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="col-form-label">Email:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="email" placeholder="Nhập email">
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
                            <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
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
                    <div class="row">
                        <div class="col-8">
                            <div class="d-flex flex-row">
                                <input type="checkbox" name="remember" class="mt-1 mr-1">
                                <p>Nhớ mật khẩu</p>
                            </div>
                        </div>
                       <div class="col-4">
                           <a href="#">Quên mật khẩu?</a>
                       </div>
                    </div>
                </form>
                <button type="button" class="btn btn-primary">Đăng nhập</button>
            </div>
        </div>
    </div>
</div>
