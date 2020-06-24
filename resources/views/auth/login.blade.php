@extends('layouts.app_login')

@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg"><b>{{ __('Đăng nhập') }}</b></p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                      <strong class="alert alert-danger"> {{ $message }}</strong>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password" value="{{ old('password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                </div>
                <div class="d-flex flex-row justify-content-between">
                    <div class="">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Nhớ mật khẩu?
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Đăng nhập') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <div class="form-group row mb-0">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Quên mật khẩu?') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
