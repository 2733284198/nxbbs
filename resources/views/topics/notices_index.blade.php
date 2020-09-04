@extends('layouts.app')

@section('title', isset($category) ? $category->name : '话题列表')

@section('content')

<div class="row mb-5">
    <div class="notice_index">
        <div class="notice-box">
            <h2 class="notice_title">
                <span class="for_pc">通知公告</span>
                <div class="content_for_pc">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <a href="#">话题列表</a>
                </div>
            </h2>

            <div class="card">
                <div class="card-body posts_content">
                    <ul class="post_list">

                        @foreach($notices as $notice)
                        <li itemscope="itemscope" itemtype="https://schema.org/Question" class="post_item post_overview">
                            <h2 class="post_title">
                                <a href="{{ $notice->link() }}" target="_blank" class="">
                                    {{ $notice->title }}
                                </a>
                                <meta check-reduce="" itemprop="name" content="社区每周 | 直播组件更新、直播预告、小程序云开发挑战赛报名及上周社区问题反馈（8.17-8.21）">
                            </h2>
                            <div class="post_info">
                                <em itemprop="contentReferenceTime" class="post_time post_info_meta"> {{ $notice->created_at }} </em>
                                <div class="post_info_extend">
                                    <span itemprop="commentCount" class="post_discuss_num post_info_meta">{{ $notice->reply_count }} 评论</span>
                                    <span class="post_discuss_num post_info_meta">4658 浏览</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="mt-5">
                        {!! $notices->appends(Request::except('page'))->render() !!}
                    </div>



                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('static/css/notice.css') }}">
@stop