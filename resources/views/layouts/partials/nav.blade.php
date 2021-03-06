<div role="navigation" class="navbar navbar-default topnav">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="/" class="navbar-brand">
                <img src="" alt="Ebookhub" />
            </a>
        </div>

        <div id="top-navbar-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-docs"><a href="{{ route('books.index') }}" class="no-pjax" target="_blank">电子书</a></li>

            </ul>

            <div class="navbar-right">

                @if ((Request::is('users*') && isset($user)) || (Request::is('search*') && $user->id > 0))

                <form method="GET" action="" accept-charset="UTF-8" class="navbar-form navbar-left">
                    <div class="form-group">
                        <input class="form-control search-input mac-style" placeholder="搜索范围：{{ $user->name }}" name="q" type="text" value="{{ (Request::is('search*') && isset($query)) ? $query : '' }}">
                        <input class="form-control search-input mac-style"  name="user_id" type="hidden" value="{{ $user->id }}">
                        @else
                        <form method="GET" action="" accept-charset="UTF-8" class="navbar-form navbar-left">
                            <div class="form-group">
                                <input class="form-control search-input mac-style" placeholder="搜索" name="q" type="text" value="{{ (Request::is('search*') && isset($query)) ? $query : '' }}">
                                @endif

                            </div>
                        </form>

                        <ul class="nav navbar-nav github-login" >
                            @if (Auth::check())
                            <li>
                                <a href="#" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    <i class="fa fa-plus text-md"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    <li>
                                        <a class="button no-pjax" href="{{ route('books.create')}}" >
                                            <i class="fa fa-paint-brush text-md"></i> 添加电子书
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li>
                                <a href="" class="text-warning" style="margin-top: -4px;">

                                </a>
                            </li>

                            <li>
                                <a href="#" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dLabel" >
                                    <img class="avatar-topnav" alt="Summer" src="" />

                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dLabel">

                                    @if (Auth::user()->can('visit_admin'))
                                    <li>
                                        <a href="/admin" class="no-pjax">
                                            <i class="fa fa-tachometer text-md"></i> 管理后台
                                        </a>
                                    </li>
                                    @endif

                                    @if(Auth::user()->can('access_board'))
                                    <li>
                                        <a class="button" href="">
                                            <i class="fa fa-users "></i> 站务
                                        </a>
                                    </li>
                                    @endif

                                    <li>
                                        <a class="button" href="" data-lang-loginout="{{ lang('Are you sure want to logout?') }}">
                                            <i class="fa fa-user text-md"></i> 个人中心
                                        </a>
                                    </li>
                                    <li>
                                        <a class="button" href="" >
                                            <i class="fa fa-cog text-md"></i> 编辑资料
                                        </a>
                                    </li>
                                    <li>
                                        <a id="login-out" class="button" href="{{ URL::route('logout') }}" data-lang-loginout="{{ lang('Are you sure want to logout?') }}">
                                            <i class="fa fa-sign-out text-md"></i> {{ lang('Logout') }}
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            @else
                            <a href="{{ URL::route('login') }}" class="btn btn-primary login-btn">
                                <i class="fa fa-user"></i>
                                {{ lang('Login') }}
                            </a>
                            @endif
                        </ul>
                    </div>
            </div>

        </div>
    </div>
