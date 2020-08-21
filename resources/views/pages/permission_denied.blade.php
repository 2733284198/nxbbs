@extends('layouts.app')
@section('title', '无权限访问')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="col-lg-5" style="">
    <div class="card ">
      <div class="card-header pt-4 pb-4 text-center bg-success">
        <a href="index.html">
          <span><img src="static/img/logo.png" alt="" height="18"></span>
        </a>
      </div>

      <div class="card-body p-4">
        <div class="text-center w-75 m-auto">
          <h4 class="text-dark-50 text-center mt-0 font-weight-bold">你想干嘛？</h4>
          <p class="text-muted mb-4">后台重地，也是尔等可以进来的？</p>
        </div>

        @if (Auth::check())
          <div class="alert alert-danger text-center mb-0">
            当前登录账号无后台访问权限。
          </div>
        @else
          <div class="alert alert-danger text-center">
            请登录以后再操作
          </div>

          <a class="btn btn-lg btn-success btn-block" href="{{ route('login') }}">
            <i class="fas fa-sign-in-alt"></i>
            登 录
          </a>
        @endif
      </div>
    </div>
  </div>
</div>
</div>
@stop

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('static/css/login.css') }}">
@stop

