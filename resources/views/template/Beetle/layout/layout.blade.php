<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/13 0013
 * Time: 22:39
 */?>
        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="The Page Description">
    <style type="text/css">@-ms-viewport{width: device-width;}</style>
    {{--<title>Beetle - App Showcase Basic</title>--}}
    <link rel="stylesheet" href="{{ asset('template/Beetle/css/layers.min.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('template/Beetle/css/font-awesome.min.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('template/Beetle/style.css') }}" media="screen">
    <link href='http://fonts.lug.ustc.edu.cn/css?family=Montserrat:400,700|Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="{{ asset('template/Beetle/respond.min.js') }}"></script>
    <![endif]-->
    <link rel="icon" href="favicon.ico">
    <link rel="apple-touch-icon" href="{{ asset('template/Beetle/img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('template/Beetle/img/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('template/Beetle/img/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('template/Beetle/img/apple-touch-icon-152x152.png') }}">
    <script src="//cdn.bootcss.com/jquery/1.8.3/jquery.min.js"></script>

    @yield('header')
</head>


@yield('content')

@include('template.Beetle.layout.footer')

@yield('footer')

{{--<script src="{{ asset('template/Beetle/') }}https://maps.googleapis.com/maps/api/js?sensor=false"></script>--}}
<script src="{{ asset('template/Beetle/js/plugins.js') }}"></script>
<script src="{{ asset('template/Beetle/js/beetle.js') }}"></script>
{{--引入验证--}}
<script src="{{ asset('assets/js/jquery-validate/jquery.validate.min.js') }}"></script>
</body>

</html>
