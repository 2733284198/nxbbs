@if (count($replies))

<ul class="list-group mt-4 border-0">
  @foreach ($replies as $reply)




  <li class="activity-info__item">
   <a
      href="{{ $reply->topic->link(['#reply' . $reply->id]) }}" class="link-to-comment" target="_blank">
      <div class="activity-info__item__bd">
        <p class="js_comment activity-info__item__comment"><span
            class="activity-info__item__comment__inner js_comment_content">
            {!! strip_tags($reply->content) !!}</span></p>
      </div>
    </a><a href="{{ $reply->topic->link(['#reply' . $reply->id]) }}" class="link-to-post" target="_blank">
      <div class="activity-info__item__ft activity-info__item_quote"><strong
          class="activity-info__item__title">{{ $reply->topic->title }}</strong>
        <p class="js_content activity-info__item__desc">{{ strip_tags($reply->topic->body) }}</p>
      </div>
    </a>
    <div class="activity-info__extend">
      <div class="activity-info__extend__hd">{{ $reply->created_at->diffForHumans() }}</div>
    </div>
  </li>

  @endforeach
</ul>

@else
<div class="empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}
<div class="mt-4 pt-1">
  {!! $replies->appends(Request::except('page'))->render() !!}
</div>
