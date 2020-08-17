<div class="card ">
    <div class="card-body" style="padding: 0">

        @foreach ($categorys as $category_info)

        @if (isset($category) && $category_info->id == $category->id)
        <div class="group-item active">
        @else
        <div class="group-item">
        @endif
                <a href="{{ route('categories.show', $category_info->id) }}" class="">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    {{$category_info->name}}
                </a>
        </div>
        @endforeach

        </div>
    </div>
