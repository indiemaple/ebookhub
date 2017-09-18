@extends('layouts.default')

@section('title')
{{ isset($category) ? $category->name : '话题列表'  }} @parent
@stop

@section('content')

<div class="col-md-9 topics-index main-col">

    @if (isset($category) && $category->id == config('phphub.life_category_id'))
    <div class="alert alert-info">
        『生活能为工作带来灵感，工作是为了更好的生活。』话题如旅行、移民、宠物等。发帖请遵守 <a style="text-decoration: underline;" href="https://laravel-china.org/topics/3022/community-posting-and-management">社区发帖和管理规范</a>。
    </div>
    @endif
    @if (isset($category) && $category->id == config('phphub.qa_category_id'))
    <div class="alert alert-info">
    </div>
    @endif
    @if (isset($category) && $category->id === 1)
    <div class="alert alert-info">
        发布招聘贴前请必须仔细阅读 <a href="https://laravel-china.org/topics/817/laravel-china-recruitment-post-specification" style="text-decoration: underline;">Laravel China 招聘贴发布规范</a>，不按规范发帖会被管理员 <a href="https://laravel-china.org/topics/2802/description-of-shen" style="text-decoration: underline;">永久下沉</a>。<a href="{{ route('topics.create', ['category_id' => 1]) }}" class="btn btn-warning">发布招聘</a>
    </div>
    @endif
    <div class="panel panel-default">

        <div class="panel-heading">

            <ul class="list-inline topic-filter">

            </ul>

            <div class="clearfix"></div>
        </div>

        @if ( ! $books->isEmpty())

        <div class="jscroll">
            <div class="panel-body remove-padding-horizontal">
                @include('books.partials.books')
            </div>

            <div class="panel-footer text-right remove-padding-horizontal pager-footer">
                <!-- Pager -->
                {!! $books->appends(Request::except('page', '_pjax'))->render() !!}
            </div>
        </div>

        @else
        <div class="panel-body">
            <div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
        </div>
        @endif

    </div>



</div>

<script src="/assets/js/scripts.js"></script>

@stop
