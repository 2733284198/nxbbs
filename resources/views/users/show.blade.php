@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')

<div class="row usershow">

  <div class="col-lg-12 col-md-12">
    <div class="card ">
      <div class="card-body personal_header">




        <img src="{{ $user->avatar }}" alt="" class="base-info__avatar">
        <div class="home_page_hd_bd"><strong class="base-info__name">{{ $user->name }}
          </strong><span class="created_at">注册于 {{ $user->created_at->diffForHumans() }}</span>
          <div class="base-info__descbox">
            <p class="base-info__desc js_introduce">
              @if ($user->introduction)
              {{ $user->introduction }}
              @else
              暂无个人介绍
              @endif
            </p>
          </div>
          <div check-reduce="" class="base-info">
            @guest

            @else
            @if (Auth::user()->id == $user->id)
            <div class="base-info__ft">
              <a href="{{ route('users.edit', Auth::id()) }}"
              class="btn btn-light">编辑资料</a>
            </div>
            @endif
            @endguest
          </div>
        </div>
        <div class="home_page_hd_footer"><a href="#"
            target="_blank" class="home_page_hd_footer_item follow group">
            <p class="home_page_hd_footer_item_hd"><span class="home_page_hd_footer_item_ic"></span>正在关注</p>
            <p class="home_page_hd_footer_item_bd">0</p>
          </a><a href="#" target="_blank"
            class="home_page_hd_footer_item follower group">
            <p class="home_page_hd_footer_item_hd"><span class="home_page_hd_footer_item_ic"></span>关注者</p>
            <p class="home_page_hd_footer_item_bd">0</p>
          </a></div>
        <div>
          <!---->
        </div>






      </div>
    </div>
  </div>











  <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
    <div class="card ">
      <div class="card-body">
        <div class="mod_default_hd">
          <h4><i class="fa fa-envelope" aria-hidden="true"></i>{{ $user->email }}</h4>
          <div class="mod_hd_extra"><a href="javascript:;" class="btn btn-success btn-sm">更换</a></div>
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
