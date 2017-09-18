

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
    <script>
        Config = {
        'token': '{{ csrf_token() }}',
        };


    </script>


    @yield('styles')



</head>
<body id="body">

{{-- Wechat share cover --}}
<div style="display: none;"
     　　document.getElementById("typediv1").style.display="none";>
@section('wechat_icon')
<img src="">
@show

</div>

<div id="wrap">

    @include('layouts.partials.nav')

    <div class="container main-container">
        @include('flash::message')




        @yield('content')

    </div>

    @include('layouts.partials.footer')

</div>





@yield('scripts')

@if (App::environment() == 'production')
<script>
    ga('create', '{{ getenv('GA_Tracking_ID') }}', 'auto');
    ga('send', 'pageview');
</script>



@endif



</body>
</html>
