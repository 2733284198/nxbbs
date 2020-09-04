@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-5">
      <div class="card">
        <div class="card-header pt-4 pb-4 text-center bg-success">
          <a href="index.html">
            <span><img src="static/img/logo.png" alt="" height="18"></span>
          </a>
        </div>

        <div class="card-body p-4">
          <div class="text-center w-75 m-auto">
            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">注册账号</h4>
            <p class="text-muted mb-4">还没有账户？创建您的账户，只需不到一分钟的时间。</p>
          </div>

          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
              <label for="name">{{ __('Name') }}</label>


              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                name="name" value="{{ old('name') }}" required autofocus>

              @if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group">
              <label for="email">{{ __('E-Mail Address') }}</label>


              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif

            </div>

            <div class="form-group">
              <label for="password">{{ __('Password') }}</label>


              <input id="password" type="password"
                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

              @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif

            </div>

            <div class="form-group">
              <label for="password-confirm">{{ __('Confirm Password') }}</label>


              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

            </div>

            <div class="form-group">
              <label for="captcha">验证码</label>
              <div class="row">
                <div class="col-md-6">
                  <input id="captcha" class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}"
                    name="captcha" required>
                </div>
                <div class="col-md-6">
                  <img class="thumbnail captcha mb-2" src="{{ captcha_src('flat') }}"
                    onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">

                  @if ($errors->has('captcha'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('captcha') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-12 offset-md-5">
                <button type="submit" class="btn btn-success">
                  {{ __('Register') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12 text-center">
            <p class="text-muted">已经有账号了? <a href="{{ route('login') }}" class="text-muted ml-1"><b>登陆</b></a></p>
        </div> <!-- end col-->
    </div>
    </div>
  </div>
</div>
@endsection


@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('static/css/login.css') }}">
@stop
