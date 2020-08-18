@extends('layouts.app')

@section('title', isset($category) ? $category->name : '话题列表')

@section('content')


<div class="nxbbs_nav_wrp">
  <div class="nxbbs_nav_wrp_cont">
    <!---->
    <ul class="nxbbs_navs">
      @foreach ($categorys as $category_info)
      @if (isset($category) && $category_info->id == $category->id)
      <li class="nxbbs_nav selected"><a href="{{ route('categories.show', $category_info->id) }}"
          class="nxbbs_nav_link">{{$category_info->name}}</a></li>
      @else
      <li class="nxbbs_nav"><a href="{{ route('categories.show', $category_info->id) }}"
          class="nxbbs_nav_link">{{$category_info->name}}</a></li>
      @endif

      @endforeach
      <!---->
    </ul>
  </div>
</div>



<div class="row mb-5">
  <div class="col-lg-9 col-md-9 topic-list">
    @if (isset($category))
    <div class="card nxbbs_category_head">
      <div class="category_main"><img class="category_icon category_tag" src="https://res.wx.qq.com/community/dist/community/images/logo_miniprogram_013191.png"><span class="category_title">{{ $category->name }}</span><span class="category_description">{{ $category->description }}</span></div>
    </div>
    @endif
    <div class="card ">

      <div class="card-header bg-transparent simple_card_header">
        <ul class="title_tab">
          <li>
            <a class="{{ active_class( ! if_query('order', 'recent')) }}"
              href="{{ Request::url() }}?order=default">
              最后回复
            </a>
          </li>
          <li>
            <a class="{{ active_class(if_query('order', 'recent')) }}"
              href="{{ Request::url() }}?order=recent">
              最新发布
            </a>
          </li>
        </ul>

        <div class="mod_hd_extra"><a href="{{ route('topics.create') }}" class="btn btn-success">发帖</a></div>

      </div>

      <div class="simple_container_body">
        {{-- 话题列表 --}}
        @include('topics._topic_list', ['topics' => $topics])
        {{-- 分页 --}}
        <div class="mt-5">
          {!! $topics->appends(Request::except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-3 sidebar">
    @include('topics._sidebar')
  </div>
</div>

@endsection
