@if (count($topics))

  <ul class="list-group mt-4 border-0">
    @foreach ($topics as $topic)
      <li class="post-item @if($loop->first) border-top-0 @endif">

        <div class="post-item-userinfo-avatar">
            <a href="{{ route('users.show', [$topic->user_id]) }}">
                <img class="post-item-userinfo-avatar-img" src="{{ $topic->user->avatar }}" title="{{ $topic->user->name }}">
            </a>
        </div>



        <div class="post-item-content">

            <small class="media-body meta text-secondary">


                <a class="nickname" href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}">
                    {{ $topic->user->name }}
                </a>

                <span class="timeago" title="最后活跃于：{{ $topic->updated_at }}">{{ $topic->created_at->diffForHumans() }}</span>
            </small>
            <a class="post-item-content-text" href="{{ route('topics.show', $topic->id) }}" title="{{ $topic->body }}">
                <div class="media-heading mt-0 mb-1">
                    {{ $topic->body }}
                </div>
            </a>
        </div>


        <div class="post-item-praise">
            <div class="praise-wrap">
                <div class="praise-top">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </div>
                <div class="praise-bottom">
                    {{ $topic->reply_count }}

                </div>
            </div>
        </div>

      </li>
    @endforeach
  </ul>

@else
  <div class="empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}
<div class="pagination-wrap">
  {!! $topics->render() !!}
</div>
