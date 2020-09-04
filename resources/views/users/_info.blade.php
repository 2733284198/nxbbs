<div class="card ">
  <div class="card-body personal_header">




    <img src="{{ $user->avatar }}" alt="" class="base-info__avatar">
    <div class="home_page_hd_bd"><strong class="base-info__name">{{ $user->name }}
      </strong>
      <div class="base-info__descbox">
        <p class="base-info__desc js_introduce">
          @if ($user->introduction)
          {{ $user->introduction }}
          @else
          暂无个人介绍
          @endif
        </p>
      </div>
      <div check-reduce="" class="base-info">

        @if (Auth::user()->id == $user->id)
        <div class="base-info__ft">
          <a href="{{ route('users.edit', Auth::id()) }}" class="btn btn-light">编辑资料</a>
        </div>
        @else

        @can('follow', $user)
          @if (Auth::user()->isFollowing($user->id))
            <form action="{{ route('followers.destroy', $user->id) }}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-sm">取消关注</button>
            </form>
          @else
            <form action="{{ route('followers.store', $user->id) }}" method="post">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-success btn-sm">关注</button>
            </form>
          @endif
      @endcan

        @endif
      </div>
    </div>
    <div class="home_page_hd_footer">
      <a href="{{ route('users.followings', $user->id) }}" class="home_page_hd_footer_item follow group {{ active_class(if_route('users.followings')) }}">
        <p class="home_page_hd_footer_item_hd"><span class="home_page_hd_footer_item_ic"></span>正在关注</p>
        <p class="home_page_hd_footer_item_bd">{{ $user->followings->count() }}</p>
      </a>

      <a href="{{ route('users.followers', $user->id) }}" class="home_page_hd_footer_item follower group {{ active_class(if_route('users.followers')) }}">
        <p class="home_page_hd_footer_item_hd"><span class="home_page_hd_footer_item_ic"></span>粉丝</p>
        <p class="home_page_hd_footer_item_bd">{{ $user->followers->count() }}</p>
      </a></div>
    <div>
      <!---->
    </div>
  </div>
</div>
