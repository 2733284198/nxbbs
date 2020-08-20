<ul class="list-unstyled">
  @foreach ($replies as $index => $reply)


  <li class="widget_comment" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">


    <a href="{{ route('users.show', [$reply->user_id]) }}" class="post_comment_owner" target="_blank">
      <span class="popover_appreciate">
        <!----><span class="popover_target">
          <div class="post_comment_owner_avatar"><img src="{{ $reply->user->avatar }}" alt="{{ $reply->user->name }}"
              class="post_comment_owner_avatar_image"></div><strong
            class="post_comment_owner_nickname">{{ $reply->user->name }}</strong>
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
          <form action="{{ route('replies.destroy', $reply->id) }}" onsubmit="return confirm('确定要删除此评论？');"
            method="post">
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

  </li>

  @endforeach
</ul>
