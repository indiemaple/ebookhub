@extends('layouts.default')

@section('title')
{{ isset($book) ? '编辑书籍' : '添加书籍' }}_@parent
@stop

@section('content')

<div class="topic_create">

    <div class="col-md-8 main-col">

        <div class="reply-box form box-block">

            <div class="alert alert-warning">

            </div>

            @include('layouts.partials.errors')

            @if (isset($book))
            <form method="POST" action="{{ route('books.update', $book->id) }}" accept-charset="UTF-8" id="topic-edit-form" class="topic-form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">
                @else
                <form method="POST" action="{{ route('books.store') }}" accept-charset="UTF-8" id="topic-create-form" class="topic-form" enctype="multipart/form-data">
                    @endif
                    {!! csrf_field() !!}
                    <div class="form-group">

                    </div>




                    <div class="form-group">
                        <input class="form-control" id="topic-title" placeholder="{{ lang('Please write down a topic') }}" name="title" type="text" value="{{ !isset($book) ? '' : $book->title }}" required="require">
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="输入百度云地址" name="baidu_source" value="{{ !isset($book) ? '' : $book->baidu_source }}">
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="输入百度云提取密码" name="baidu_source_key" value="{{ !isset($book) ? '' : $book->baidu_source_key }}">
                    </div>

                    <div class="form-group">
                        <label for="cover" class="col-sm-2 control-label">封面</label>
                        <input type="file" name="cover">
                        @if(isset($book) && $book->cover)
                            <img class="cover" src="{{ $book->cover }}" />
                        @endif
                    </div>

                    <div class="form-group">
                        <textarea required="require" class="form-control" rows="20" style="overflow:hidden" id="reply_content" placeholder="{{ lang('Please using markdown.') }}" name="body" cols="50">{{ !isset($book) ? '' : $book->body_original }}</textarea>
                    </div>

                    <div class="form-group status-post-submit">
                        <button class="btn btn-primary submit-btn" id="topic-submit" type="submit">{{ lang('Publish') }}</button>
                    </div>

                </form>

        </div>
    </div>

    <div class="col-md-4 side-bar">

        <div class="panel panel-default corner-radius help-box">
            <div class="panel-heading text-center">
                <h3 class="panel-title">{{ lang('This kind of topic is not allowed.') }}</h3>
            </div>
            <div class="panel-body">
                <ul class="list">

                </ul>
            </div>
        </div>

        <div class="panel panel-default corner-radius help-box">
            <div class="panel-heading text-center">
                <h3 class="panel-title">{{ lang('We can benefit from it.') }}</h3>
            </div>
            <div class="panel-body">
                <ul class="list">
                   <li></li>
                </ul>
            </div>
        </div>

    </div>
</div>
<link rel="stylesheet" href="/assets/css/editor.css">
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/editor.js"></script>

<script type="text/javascript">

    $(document).ready(function()
    {


        $('#category-select').on('change', function() {
            var current_cid = $(this).val();
            $('.category-hint').hide();
            $('.category-'+current_cid).fadeIn();
        });

        var simplemde = new SimpleMDE({
            spellChecker: false,
            autosave: {
                enabled: {{ isset($book) ? 'false' : 'true' }},
        delay: 5000,
            unique_id: "topic_content{{ isset($book) ? $book->id : '' }}"
    },
        forceSync: true,
            tabSize: 4,
        toolbar: [
        "bold", "italic", "heading", "|", "quote", "code", "table",
        "horizontal-rule", "unordered-list", "ordered-list", "|",
        "link", "image", "|",  "side-by-side", 'fullscreen', "|",
        {
            name: "guide",
            action: function customFunction(editor){
                var win = window.open('https://github.com/riku/Markdown-Syntax-CN/blob/master/syntax.md', '_blank');
                if (win) {
                    //Browser has allowed it to be opened
                    win.focus();
                } else {
                    //Browser has blocked it
                    alert('Please allow popups for this website');
                }
            },
            className: "fa fa-info-circle",
            title: "Markdown 语法！",
        },
        {
            name: "publish",
            action: function customFunction(editor){
                $('#topic-submit').click();
            },
            className: "fa fa-paper-plane",
            title: "发布文章",
        }
    ],
    });

        inlineAttachment.editors.codemirror4.attach(simplemde.codemirror, {
            uploadUrl: '{{ route('upload_image') }}',
            extraParams: {
                '_token': Config.token,
            },
            onFileUploadResponse: function(xhr) {
                var result = JSON.parse(xhr.responseText),
                    filename = result[this.settings.jsonFieldName];

                if (result && filename) {
                    var newValue;
                    if (typeof this.settings.urlText === 'function') {
                        newValue = this.settings.urlText.call(this, filename, result);
                    } else {
                        newValue = this.settings.urlText.replace(this.filenameTag, filename);
                    }
                    var text = this.editor.getValue().replace(this.lastValue, newValue);
                    this.editor.setValue(text);
                    this.settings.onFileUploaded.call(this, filename);
                }
                return false;
            }
        });
    });



</script>

@stop

@section('scripts')





@stop
