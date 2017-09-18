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
        <div class="markdown-body" id="emojify">
            {!! $book->body !!}
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
