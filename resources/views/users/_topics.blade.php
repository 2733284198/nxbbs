@if (count($topics))

<ul class="list-group mt-4 border-0">
  @foreach ($topics as $topic)



  <li class="activity-info__item"><a href="{{ $topic->link() }}" class="link-to-post" target="_blank">
      <div class="activity-info__item__ft"><strong class="activity-info__item__title">
          {{ $topic->title }}
        </strong>
        <p class="activity-info__item__desc js_content">{{ strip_tags($topic->body) }} </p>
      </div>
    </a>
    <div class="activity-info__extend">
      <div class="activity-info__extend__hd">{{ $topic->created_at->diffForHumans() }} {{ $topic->reply_count }} 回复
      </div>
    </div>
  </li>

  @endforeach
</ul>

@else
<div class="empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}
<div class="mt-4 pt-1">
  {!! $topics->render() !!}
</div>
