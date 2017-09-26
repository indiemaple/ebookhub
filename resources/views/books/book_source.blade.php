<!DOCTYPE html>
<html lang="zh">
<head>

    <meta charset="UTF-8">

    <title>@section('title')Ebookhub 社区 - 高品质的电子书社区@show</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

    <meta name="keywords" content="php,laravel,php论坛,laravel论坛,php社区,laravel社区,laravel教程,php教程,laravel视频,php开源,php新手,php7,laravel5" />
    <meta name="author" content="PHPHub" />
    <meta name="description" content="@section('description') Laravel China 是国内最大的 Laravel 和 PHP 中文社区，致力于推动 Laravel，PHP7、php-fig 等 PHP 新技术，新理念在中国的发展，是国内最靠谱的 PHP 论坛。 @show" />
    <meta name="_token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/app.css">

    <link rel="shortcut icon" href=""/>
</head>
<body id="body">
<div style="text-align:center;border-bottom-width:1px;border-bottom-style:dashed;padding: 5px 0; font-size: 16px; font-family:'微软雅黑'">提取密码：{{ $book->baidu_source_key }}</div>
<style>
  html, body {
    padding: 0px;
    margin: 0px;
    height: 100%;
  /*  overflow: hidden; */
  }
  iframe {
    border-width: 0px;
    width: 100%;
    height: 100%;
  }

</style>

<iframe src="{{ $book->baidu_source }}"  ></iframe>

</body>
</html>
