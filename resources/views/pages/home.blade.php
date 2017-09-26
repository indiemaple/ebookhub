@extends('layouts.default')
@section('content')

<div class="jumbotron">
    <h1>ebookhub</h1>
    <p>电子书分享</p>
    <div class="search-wraper" role="search">
        <div class="form-group"><input class="form-control search clearable" placeholder="搜索"
                                       autocomplete="off" autofocus="" tabindex="0" autocorrect="off"
                                       autocapitalize="off" spellcheck="false"> <i class="fa fa-search"></i></div>
    </div>
</div>

<div class="contentBox">
    <ul class="list-group">
        @foreach ($books as $book)
        <li class="">
            <div>
                <a href="{{ route('books.show', $book->id) }}">
                    <img src="{{ $book->cover }}">
                    <h5>{{ $book->title }}</h5>
                </a>
            </div>
        </li>
        @endforeach

    </ul>
</div>
<script src="/assets/js/scripts.js"></script>
@stop
