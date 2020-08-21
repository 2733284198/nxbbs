@if (count($active_users))
<div class="card ">
  <div class="card-header">
    活跃用户
  </div>
  <div class="card-body">


    <div class="rank__container">
      <ul class="rank">
        @foreach ($active_users as $active_user)
        <li class="rank__item"><a href="{{ route('users.show', $active_user->id) }}"
            class="rank__item__container" target="_blank" title="{{ $active_user->name }}"><img
              src="{{ $active_user->avatar }}"
              class="rank__avatar">
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
