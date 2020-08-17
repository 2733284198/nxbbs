@extends('layouts.app')

@section('title', isset($category) ? $category->name : '话题列表')

@section('content')

<div class="row mb-5">
    <div class="col-lg-9 col-md-9 topic-list">
        <div class="card ">
            @if (isset($category))
            <div class="alert alert-info" role="alert" style="margin: 20px 20px 0px; padding: 16px 16px 16px 69px;">
                <span class="ivu-alert-icon">
                    <i class="fa fa-flag" aria-hidden="true"></i>
                </span>
                <span class="category_name">{{ $category->name }}</span>
                <span class="category_description">{{ $category->description }}</span>
            </div>
            @endif
            <div class="card-header posts-addons">
                <ul class="nav posts-filter-wrap">
                    <li class="nav-item"><a class="nav-link {{ active_class( ! if_query('order', 'recent')) }}" href="{{ Request::url() }}?order=default">最后回复</a></li>
                    <li class="nav-item"><a class="nav-link {{ active_class(if_query('order', 'recent')) }}" href="{{ Request::url() }}?order=recent">最新发布</a></li>
                </ul>
                <div class="posts-compose-entrance">
                    <a class="create" href="{{ route('topics.create') }}">
                        <i class="fas fa-pencil-alt" style="font-size: 12px;"></i> 发布
                      </a>
                </div>
            </div>

            <div class="card-body posts-container">
                {{-- 话题列表 --}}
                @include('topics._topic_list', ['topics' => $topics])
                {{-- 分页 --}}
                <div class="pagination-wrap">
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
