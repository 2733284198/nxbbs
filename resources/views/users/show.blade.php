@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')

<div class="row">

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    {{-- 用户发布的内容 --}}
    <div class="card">
        <div class="card-body">
          <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active bg-transparent" href="#">Ta 的话题</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Ta 的回复</a></li>
          </ul>
          @include('users._topics', ['topics' => $user->topics()->recent()->paginate(5)])
        </div>
      </div>

    </div>


    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">




        <div class="left-bar card">
            <div class="user-bg"></div>
            <div class="user-info">
                <div class="user-avatar"><img
                        src="{{ $user->avatar }}"
                        alt="{{ $user->name }}" class="avatar-img"></div>
                <div class="user-name">
                    <span class="username">{{ $user->name }}</span>
                </div>
            </div>
            <div class="user-signature">
                <span>{{ $user->introduction }}</span>
                <span class="user_created_at">注册: {{ $user->created_at->diffForHumans() }}</span>
                <span class="user_email">邮箱: {{ $user->email }}</span>
            </div>
        </div>

    </div>



</div>
@stop
