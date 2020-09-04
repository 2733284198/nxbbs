@extends('layouts.app')

@section('content')

<div class="container page_askquestion_detail" style="padding: 0">
  <div class="col-md-12" style="padding: 0">
    <h2 class="page_title">
      <img class="page_title_ic page_title_ic_ask"
        src="https://res.wx.qq.com/community/dist/community/images/icon_question_4b2595.svg" alt="">
      @if($topic->id)
      编辑话题
      @else
      新建话题
      @endif
    </h2>

    @if($topic->id)
    <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
      <input type="hidden" name="_method" value="PUT">
      @else
      <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
        @endif

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="type_id" value="1">

        @include('shared._error')

        <div class="card askquestion_section">
          <div class="form-group row">
            <label for="title" class="col-sm-1 col-form-label">话题标题</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="title" value="{{ old('title', $topic->title ) }}"
                placeholder="请填写标题" required />
            </div>
          </div>
        </div>


        <div class="card askquestion_section">
          <textarea name="body" class="form-control" id="editor" rows="15" placeholder="请填入至少三个字符的内容。"
            required>{{ old('body', $topic->body ) }}</textarea>
        </div>

        <div class="card askquestion_section" style="display: -webkit-box">
          @foreach ($categories as $value)
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" value="{{ $value->id }}" id="{{ $value->id }}" name="category_id"
              class="custom-control-input" {{ $topic->category_id == $value->id ? 'checked' : '' }}>
            <label class="custom-control-label" for="{{ $value->id }}">{{ $value->name }}</label>
          </div>
          @endforeach
        </div>


        <div class="well well-sm" style="text-align: right;">
          <button type="submit" class="btn btn-success"><i class="far fa-save mr-2" aria-hidden="true"></i> 保存</button>
        </div>

      </form>


  </div>
</div>

@stop

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('static/css/simditor.css') }}">
@stop

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>

  <script>
    $(document).ready(function() {
      var editor = new Simditor({
        textarea: $('#editor'),
        upload: {
          url: '{{ route('topics.upload_image') }}',
          params: {
            _token: '{{ csrf_token() }}'
          },
          fileKey: 'upload_file',
          connectionCount: 3,
          leaveConfirm: '文件上传中，关闭此页面将取消上传。'
        },
        pasteImage: true,
      });
    });
  </script>
@stop
