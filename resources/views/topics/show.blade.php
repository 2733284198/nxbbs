@extends('layouts.app')

@section('title', $topic->title)
@section('description', $topic->excerpt)

@section('content')

<div class="row page_detail">

  <div class=" @if(($topic->type_id)==1)col-lg-12 col-md12 col-sm-12 col-xs-12 @else col-lg-9 col-md9 col-sm-12 col-xs-12 @endif topic-content">
    <div class="card ">
      @if(($topic->type_id)==3)
      <div class="card-body">
        <h1 class="post_title" style="text-align: center;">
          {{ $topic->title }}
        </h1>


        <div class="post_info" style="text-align: center;">

          <span class="popover__box popover_appreciate popover__box_hide">
            <span class="popover_target">
              <a href="{{ route('users.show', $topic->user->id) }}" class="post_owner post_info_meta">
                {{ $topic->user->name }}
              </a>
            </span>
          </span>
          <em id="create_time" class="post_time post_info_meta"> {{ $topic->created_at->diffForHumans() }}</em>
          <span class="post_discuss_num post_info_meta">
            <span> {{ $topic->reply_count }}</span>
            <span class="post_info_meta_inner_text">
              浏览
            </span>
          </span>
          <span class="post_info_meta_inner_text">
            {{ $topic->category->name }}
          </span>

        </div>


        <div class="topic-body mt-4 mb-4">
          {!! $topic->body !!}
        </div>

        @can('update', $topic)
        <div class="operate">
          <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-outline-secondary btn-sm" role="button">
            <i class="far fa-edit"></i> 编辑
          </a>
          <form action="{{ route('topics.destroy', $topic->id) }}" method="post" style="display: inline-block;" onsubmit="return confirm('您确定要删除吗？');">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-outline-secondary btn-sm">
              <i class="far fa-trash-alt"></i> 删除
            </button>
          </form>
        </div>
        @endcan

      </div>
      @else
      <div class="card-body">
        <h1 class="post_title">
          {{ $topic->title }}
        </h1>

        @if(($topic->type_id)==1)
        <div style="width: 28px; height: 16px; line-height: 16px; background-color: #07c160; margin-top: 8px; font-size: 10px; text-align: center; color:#ffffff">官方</div>
        <div class="post_info">
          <span class="popover__box popover_appreciate popover__box_hide">
            <span class="popover_target">
              南向团队
            </span>
          </span>
          <em id="create_time" class="post_time post_info_meta"> &nbsp;&nbsp; {{ $topic->created_at->diffForHumans() }}</em>

        </div>
        @else
        <div class="post_info">

          <span class="popover__box popover_appreciate popover__box_hide">
            <span class="popover_target">
              <a href="{{ route('users.show', $topic->user->id) }}" class="post_owner post_info_meta">
                {{ $topic->user->name }}
              </a>
            </span>
          </span>
          <em id="create_time" class="post_time post_info_meta"> {{ $topic->created_at->diffForHumans() }}</em>
          <span class="post_discuss_num post_info_meta">
            <span> {{ $topic->reply_count }}</span>
            <span class="post_info_meta_inner_text">
              浏览
            </span>
          </span>
          <span class="post_info_meta_inner_text">
            {{ $topic->category->name }}
          </span>

        </div>
        @endif


        <div class="topic-body mt-4 mb-4">
          {!! $topic->body !!}
        </div>

        @can('update', $topic)
        <div class="operate">
          @can('manage_contents')
          <form action="{{ route('topics.top', $topic->id) }}" method="post" style="display: inline-block;">
            <input type="hidden" name="top" value="$topic->top">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-outline-secondary btn-sm">
              @if(($topic->top)==0)<i class="fa fa-toggle-off" aria-hidden="true"></i> 置顶
              @else
              <i class="fa fa-toggle-on" aria-hidden="true" style="color: #07c160;"></i> 取消置顶
              @endif
            </button>
          </form>
          @endcan
          <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-outline-secondary btn-sm" role="button">
            <i class="far fa-edit"></i> 编辑
          </a>
          <form action="{{ route('topics.destroy', $topic->id) }}" method="post" style="display: inline-block;" onsubmit="return confirm('您确定要删除吗？');">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-outline-secondary btn-sm">
              <i class="far fa-trash-alt"></i> 删除
            </button>
          </form>
        </div>
        @endcan

      </div>
      @endif
    </div>


    {{-- 用户回复列表 --}}
    <div class="card topic-reply mt-4">
      <h5 class="card-header">{{ $topic->reply_count }}个回答</h5>
      <div class="card-body">
        @include('topics._reply_list', ['replies' => $topic->replies()->with('user')->get()])
        @includeWhen(Auth::check(), 'topics._reply_box', ['topic' => $topic])
      </div>
    </div>


  </div>

  @if(($topic->type_id)!=1)
  <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
    <div class="card ">
      <div class="card-body">

      </div>
    </div>
  </div>
  @endif

</div>

@stop


@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('static/css/show.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('static/css/simditor.css') }}">
@stop