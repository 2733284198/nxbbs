<ul class="list-unstyled">
  @foreach ($comments as $index => $reply)


  <li class="widget_comment" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">


    <a href="{{ route('users.show', [$reply->user_id]) }}" class="post_comment_owner" target="_blank">
      <span class="popover_appreciate">
        <!----><span class="popover_target">
          <div class="post_comment_owner_avatar"><img src="{{ $reply->user->avatar }}" alt="{{ $reply->user->name }}" class="post_comment_owner_avatar_image"></div><strong class="post_comment_owner_nickname">{{ $reply->user->name }}</strong>
        </span></span></a>

    <span class="post_comment_pos">
      <span class="post_comment_time">{{ $reply->created_at->diffForHumans() }}</span></span>


    <div class="post_comment_content">
      <p>{!! $reply->content !!}</p>
    </div>
    <!---->

    @can('destroy', $reply)
    <div class="post_comment_info">
      <div class="post_comment_opr">
        <span class="post_opr_meta">
          <form action="{{ route('replies.destroy', $reply->id) }}" onsubmit="return confirm('确定要删除此评论？');" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-default btn-xs pull-left text-secondary">
              <i class="icon_post_opr edit"></i><span class="post_opr_wording">删除</span>
            </button>
          </form>
        </span>
      </div>
    </div>
    @endcan
   


    @foreach($replies as $replie)
    @if($reply->id == $replie->replies_id)

    <div class="reply-container">
      <div class="post_comment_area">
        <div class="post_reply_avatar">
          <img src="{{ $reply->user->avatar }}" alt="Nikita">
        </div>
        <a class="reply-user" href="{{ route('users.show', [$reply->user_id]) }}">{{ $replie->user->name }}:</a>

        <p class="reply-content">{!! $replie->content !!}</p>

        <div class="reply-operations">
          {{ $replie->created_at->diffForHumans() }}
        </div>
        @can('destroy', $reply)
        <form action="{{ route('replies.destroy', $replie->id) }}" method="post" onsubmit="return confirm('确定要删除此评论？');">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-default btn-xs pull-left text-secondary">
              删除
            </button>
          </form>
          @endcan
      </div>
    </div>

    @endif
    @endforeach

    @if(Auth::check())
    <div class="post_comment_reply_area">
      <div class="post_comment_list">
        <div class="comment-avatar">
          <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
        </div>

        <form action="{{ route('comments.store') }}" method="POST" accept-charset="UTF-8" class="comments-reply">
          <input type="hidden" name="topic_id" value="{{ $topic->id }}">
          <input type="hidden" name="replies_id" value="{{ $reply->id }}">
          {{ csrf_field() }}
          <div class="input-group mb-3">
          <input class="form-control" type="text" name="content" placeholder="回复{{ $reply->user->name }}">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary btn-sm">回复</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    @endif

  </li>

  @endforeach
</ul>