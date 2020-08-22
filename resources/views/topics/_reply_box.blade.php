@include('shared._error')

<div class="reply-box">
  <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="topic_id" value="{{ $topic->id }}">
    <div class="form-group">
      <textarea id="editor" class="form-control" rows="6" placeholder="分享你的见解~" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-share mr-1"></i> 回复</button>
  </form>
</div>


@section('scripts')
  <script type="text/javascript" src="{{ asset('static/js/module.js') }}"></script>
  <script type="text/javascript" src="{{ asset('static/js/hotkeys.js') }}"></script>
  <script type="text/javascript" src="{{ asset('static/js/uploader.js') }}"></script>
  <script type="text/javascript" src="{{ asset('static/js/simditor.js') }}"></script>

  <script>
    $(document).ready(function() {
      var editor = new Simditor({
        textarea: $('#editor'),
        toolbar:[
      'bold',
      'color',
      'ul',
      'code',
      'image',
      ],
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
