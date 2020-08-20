@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card">
              <div class="card-header pt-4 pb-4 text-center bg-success">
                <a href="index.html">
                  <span><img src="https://coderthemes.com/hyper/modern/assets/images/logo.png" alt="" height="18"></span>
                </a>
              </div>

                <div class="card-body p-4">

                  <div class="text-center w-75 m-auto">
                    <h4 class="text-dark-50 text-center mt-0 font-weight-bold">重设密码</h4>
                    <p class="text-muted mb-4">输入您的电子邮件地址和密码进入论坛。</p>
                  </div>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>


                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>


                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>


                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                        </div>

                        <div class="form-group mb-0 text-center">

                                <button type="submit" class="btn btn-success">
                                    {{ __('Reset Password') }}
                                </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('static/css/login.css') }}">
@stop
