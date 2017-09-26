@extends('layouts.default')

@section('title')
{{{ $book->title }}} | @parent
@stop

@section('description')

@stop

@section('content')

<div class="col-md-9 book-show main-col">
  <!-- Book Detail -->
  <div class="book panel panel-default">
    <div class="infos panel-heading">

      <h1 class="panel-title book-title">{{{ $book->title }}}</h1>


    </div>

    <div class="content-body entry-content panel-body ">
        <div class="row box-shadow">
            <div class="col-xs-6">
                <img src="{{ $book->cover }}" class="img-responsive">
            </div>
            <div class="col-xs-6">
                <div class="markdown-body" id="emojify">
                    {!! $book->body !!}
                </div>
            </div>


        </div>
        <hr>
        <div class="row">
            <div class="col-xs-2">下载链接：</div>
            <div class="col-xs-2">
                <a href="{{ route('books.bookSource', $book->id) }}">百度网盘</a>
            </div>
        </div>


    </div>
    <div class="appends-container" data-lang-append="{{ lang('Append') }}">

    </div>


  </div>




</div>


<script src="/assets/js/scripts.js"></script>


@stop

@section('scripts')

@stop
