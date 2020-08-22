@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')

<div class="row usershow">

  <div class="col-lg-12 col-md-12">
    @include('users._info')
  </div>


  <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
    <div class="card ">
      <div class="card-body">
        <div class="mod_default_hd">
          <h4><i class="fa fa-envelope" aria-hidden="true"></i>{{ $user->email }}</h4>
          <div class="mod_hd_extra"><a href="{{ route('users.edit', Auth::id()) }}"
              class="btn btn-success btn-sm">更换</a></div>
        </div>
      </div>
    </div>

    <div class="card" style="line-height: 30px;">
      <div class="card-body">
        <div class="mod_default_hd">
          <h4><i class="fa fa-envelope" aria-hidden="true"></i>注册时间：{{ $user->created_at->diffForHumans() }}</h4>
        </div>
        <div class="mod_default_hd">
          <h4><i class="fa fa-envelope" aria-hidden="true"></i>最后活跃：{{ $user->last_actived_at->diffForHumans() }}</h4>
        </div>
      </div>
    </div>


  </div>

  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

    {{-- 用户发布的内容 --}}
    <div class="card ">
      <div class="card-body classify-list_box">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link {{ active_class(if_query('tab', null)) }}" href="{{ route('users.show', $user->id) }}">
              话题
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ active_class(if_query('tab', 'replies')) }}"
              href="{{ route('users.show', [$user->id, 'tab' => 'replies']) }}">
              回复
            </a>
          </li>
        </ul>
        @if (if_query('tab', 'replies'))
        @include('users._replies', ['replies' => $user->replies()->with('topic')->recent()->paginate(5)])
        @else
        @include('users._topics', ['topics' => $user->topics()->recent()->paginate(5)])
        @endif
      </div>
    </div>

  </div>
</div>
@stop


@section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('static/css/userinfo.css') }}">
@stop
