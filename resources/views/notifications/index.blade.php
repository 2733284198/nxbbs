@extends('layouts.app')

@section('title', '我的通知')

@section('content')
  <div class="container page_askquestion_detail" style="padding: 0">
    <div class="col-md-12" style="padding: 0">
      <h2 class="page_title">
        <img class="page_title_ic page_title_ic_ask"
          src="https://res.wx.qq.com/community/dist/community/images/title_msg_ico_d20d77.svg" alt="">
        消息中心
      </h2>
      <div class="card message-list">

        <div class="card-body">

          <div class="card-header bg-transparent simple_card_header">
            <ul class="title_tab">
              <li>
                  全部消息
              </li>
            </ul>

          </div>

          @if ($notifications->count())

            <div class="list-unstyled notification-list">
              @foreach ($notifications as $notification)
                @include('notifications.types._' . Str::snake(class_basename($notification->type)))
              @endforeach

              {!! $notifications->render() !!}
            </div>

          @else
            <div class="empty-block" style="margin-top: 20px">没有消息通知！</div>
          @endif

        </div>
      </div>
    </div>
  </div>
@stop
