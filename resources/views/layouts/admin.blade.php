<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/5 0005
 * Time: 9:07
 */?>

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />
    <meta name="user" content="{{ $userSelf = Auth::user() }}" />
    {{--ajax使用防止跨站攻击--}}
    <meta name="_token" content="{{ csrf_token() }}"/>

    <title>ADKi博客后台管理系统</title>

    {{--360前端字体库--}}
    {{--<link rel="stylesheet" href="http://fonts.lug.ustc.edu.cn/css?family=Arimo:400,700,400italic">--}}
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/linecons/css/linecons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/xenon-core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/xenon-forms.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/xenon-components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/xenon-skins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    {{--附加css--}}
    @yield('css')

    <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('assets/js/respond.min.js') }}"></script>
    <![endif]-->




</head>
<body class="page-body">

{{--引入顶部个人设置--}}
@include('layouts.settings_pane')

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
    {{--引入侧边栏--}}
    @include('layouts.sidebar_menu')
    <div class="main-content">
        {{--引入顶部导航--}}
        @include('layouts.nav')

        {{--模板内容--}}
        @yield('content')

        {{--引入底部文件--}}
        @include('layouts.footer')
    </div>
    {{--引入聊天--}}
    @include('layouts.chat')

</div>


<!-- Bottom Scripts -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/js/resizeable.js') }}"></script>
<script src="{{ asset('assets/js/joinable.js') }}"></script>
<script src="{{ asset('assets/js/xenon-api.js') }}"></script>
<script src="{{ asset('assets/js/xenon-toggles.js') }}"></script>
{{--额外js--}}
@yield('js')

<!-- JavaScripts initializations and stuff -->
<script src="{{ asset('assets/js/xenon-custom.js') }}"></script>

</body>
</html>