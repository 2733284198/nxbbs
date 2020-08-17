@extends('layouts.app')

@section('content')

  <div class="container" style="padding: 0px">
    <div class="col-md-12" style="padding: 0px">
      <div class="card ">

        <div class="card-body">

          @if($topic->id)
            <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
              <input type="hidden" name="_method" value="PUT">
          @else
            <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
          @endif

              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              @include('shared._error')

              <div class="form-group btn-main">
                <select class="form-control btn-left" style="width: 200px;" name="category_id" required>
                  <option value="" hidden disabled selected>请选择分类</option>
                  @foreach ($categories as $value)
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endforeach
                </select>
                <button type="submit" class="btn btn-primary btn-right"><i class="far fa-save mr-2" aria-hidden="true"></i> 保存</button>
              </div>




              <div class="form-group">
                <textarea name="body" class="form-control" id="editor" rows="6" placeholder="请填入至少三个字符的内容。" required>{{ old('body', $topic->body ) }}</textarea>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection
