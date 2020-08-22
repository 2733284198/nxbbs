<div class="card page_mod_blog_panel">
  <div class="card-header">
  </div>
<div class="card-body">
  <a
    href="{{ route('users.show', Auth::id()) }}" target="_blank" class="page_mod_blog_panel_head"><img
      src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" width="50px"
      height="50px" class="page_mod_blog_panel_head_avatar">
    <div class="page_mod_blog_panel_head_bd">
      <div class="page_mod_blog__nickname">
        <p class="page_mod_blog_panel_head_name">{{ Auth::user()->name }}</p>
        <!---->
        <!---->
        <!---->
        <div title="成长等级：1" class="mode__grow-up-tag mode__grow-up-tag__small"><span
            class="grow__up__tag__icon grow__up__tag__growup1__icon grow__up__tag__growup1__icon"></span></div>
      </div>
      <p class="page_mod_blog_panel_head_desc">{{ Auth::user()->introduction }}</p>
    </div>
  </a>
  <div class="page_mod_blog_panel_body"><a href="/community/personal/oCJUsw-OPwXiX2KTIcmYXE09ytrk/article#personaltab"
      target="_blank" class="page_mod_blog_panel_body_item">
      <p class="page_mod_blog_panel_body_item_title">帖子</p>
      <p class="page_mod_blog_panel_body_item_desc">{{ Auth::user()->topics->count() }}</p>
    </a><a href="" target="_blank"
      class="page_mod_blog_panel_body_item">
      <p class="page_mod_blog_panel_body_item_title">回复</p>
      <p class="page_mod_blog_panel_body_item_desc">{{ Auth::user()->replies->count() }}</p>
    </a><a href="" target="_blank"
      class="page_mod_blog_panel_body_item">
      <p class="page_mod_blog_panel_body_item_title">关注者</p>
      <p class="page_mod_blog_panel_body_item_desc">0</p>
    </a></div>
  {{-- <div class="page_mod_blog_panel_foot"><a href=""
      target="_blank" class="page_mod_blog_panel_foot_item">我关注的问答</a><a
      href="" target="_blank"
      class="page_mod_blog_panel_foot_item">我的收藏</a></div> --}}
</div>
</div>


@if (count($active_users))
<div class="card ">
  <div class="card-header">
    活跃用户
  </div>
  <div class="card-body">


    <div class="rank__container">
      <ul class="rank">
        @foreach ($active_users as $active_user)
        <li class="rank__item"><a href="{{ route('users.show', $active_user->id) }}" class="rank__item__container"
            target="_blank" title="{{ $active_user->name }}"><img src="{{ $active_user->avatar }}" class="rank__avatar">
            <div class="rank__item__content">
              <p class="rank__item__name">{{ $active_user->name }}</p>
            </div>
          </a></li>
        @endforeach
      </ul>
    </div>


  </div>
</div>

@endif
