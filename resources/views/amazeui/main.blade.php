<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>amazeui--后台管理</title>
    <meta name="description" content="amazeui--后台管理">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="stylesheet" href="{{ asset('libs/bower_components/amazeui/dist/css/amazeui.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

<header class="am-topbar admin-header">
    <div class="am-topbar-brand">
        <strong>amazeui</strong>
        <small>后台管理</small>
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
            data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span
                class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            {{--<li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span
                            class="am-badge am-badge-warning">5</span></a></li>--}}
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span>您好:  {{ Auth::user()->real_name }} <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
                    <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="{{ url('logout') }}"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span
                            class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>

<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list">
                @foreach($actions as $action)
                    @if($action->children->isEmpty())
                        <li><a @if($action->action)href="{{ action($action->action) }}"@endif><span
                                        class="{{ $action->prefix_class }}"></span> {{ $action->action_name }}</a>
                        </li>
                    @else
                        <li class="admin-parent">
                            <a class="am-cf" data-am-collapse="{target: '#collapse-nav-{{ $action->id }}'}"><span
                                        class="{{ $action->prefix_class }}"></span>
                                {{ $action->action_name }} <span
                                        class="am-icon-angle-right am-fr am-margin-right"></span></a>
                            <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav-{{ $action->id }}">
                                @foreach($action->children as $subaction)
                                    <li><a @if($subaction->action)href="{{ action($subaction->action) }}"@endif class="am-cf"><span
                                                    class="{{ $subaction->prefix_class }}"></span> {{ $subaction->action_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-bookmark"></span> 公告</p>

                    <p>时光静好，与君语；细水流年，与君同。—— Amaze UI</p>
                </div>
            </div>
            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-tag"></span> wiki</p>

                    <p>Welcome to the Amaze UI wiki!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar end -->

    <!-- content start -->
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> /
                <small>一些常用模块</small>
            </div>
        </div>
        @yield('content')
    </div>
    <!-- content end -->

</div>

<a class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer data-am-widget="footer" class="am-footer am-footer-default" data-am-footer="{  }">
    <div class="am-footer-miscs ">
        <p>由
            <a href="javascript:void(0)" title="amazeui" target="_blank" class="">amazeui</a>提供技术支持</p>

        <p>CopyRight©2015 AllMobilize Inc.</p>

        <p>京ICP备13033158</p>
    </div>
</footer>


<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{ asset('libs/bower_components/jquery/dist/jquery.js') }}"></script>
<script src="{{ asset('libs/bower_components/amazeui/dist/js/amazeui.js') }}"></script>
<!--<![endif]-->
<script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
