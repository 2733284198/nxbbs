@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="row usershow">

  <div class="col-lg-12 col-md-12">
    @include('users._info')
  </div>

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    {{-- 关注和粉丝--}}
    <div class="card  table_list">
      <div class="card-header">
        {{$title}}
      </div>
      <div class="card-body">
        <ul class="table_list_body">
          @foreach ($users as $userinfo)
          <li class="table_list_tr">
            <div class="table_list_item table_list_item_avatar"><img src="{{ $userinfo->avatar }}"
                class="table_list_item_avatar_img"></div>
            <div class="table_list_item table_list_item_info"><a href="{{ route('users.show', $userinfo) }}"
                class="post_comment_owner">
                <p class="table_list_item_info_title">{{ $userinfo->name }}</p>
              </a>
              <p class="table_list_item_info_desc"></p>
              <div class="table_list_item_info_extend">
                <p class="table_list_item_info_extend_item">{{ $userinfo->topics->count() }} 文章</p>
                <p class="table_list_item_info_extend_item">{{ $userinfo->replies->count() }} 回答</p>
                <p class="table_list_item_info_extend_item">{{ $userinfo->followers->count() }} 粉丝</p>
              </div>
            </div>



            <div class="table_list_item table_list_item_opr" style="display:;">
              @can('follow', $userinfo)
              @if (Auth::user()->isFollowing($userinfo->id))
              <form action="{{ route('followers.destroy', $userinfo->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-sm">已关注</button>
              </form>
              @else
              <form action="{{ route('followers.store', $userinfo->id) }}" method="post">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success btn-sm">关注</button>
              </form>
              @endif
              @endcan
            </div>
          </li>
          @endforeach




        </ul>




      </div>
    </div>

  </div>
</div>
@stop

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('static/css/userinfo.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('static/css/follow.css') }}">
@stop
