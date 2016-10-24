<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/19 0019
 * Time: 12:47
 */?>

@extends('template.Beetle.layout.layout')

@section('header')
    <title>{{ $seo_photography->name." - ".config('blog.powered') }}</title>
    <meta name="keywords" content="{{ $seo_photography->keyword }}">
    <meta name="description" content="{{ $seo_photography->describe }}" >
@endsection

@section('content')
<body class="portfolio">

@include('template.Beetle.layout.header')

<main role="main">
    @include('template.Beetle.layout.galleryheader')

    <div id="main" class="row">
        <div class="row-content buffer clear-after">
            <ul class="inline cats filter-options">
                @foreach($galleryCate as $cate)
                    <li data-group="{{ $cate->name }}">{{ $cate->name }}</li>
                @endforeach
               {{-- <li data-group="nature">Nature</li>
                <li data-group="sun">Sun</li>
                <li data-group="water">Water</li>
                <li data-group="wind">Wind</li>
                <li data-group="people">People</li>
                <li data-group="city">City</li>--}}
            </ul>
            <div class="grid-items portfolio-section preload lightbox">
                @foreach($galleryList as $key => $gallery)
                    <article class="item column @if($key == 1) six @else three @endif" data-groups='["{{ $gallery->cate_name }}"]'>
                        <figure style="overflow: hidden;"><img src="{{ asset($gallery->path) }}" alt="{{ $gallery->name }}"></figure>
                        <a class="overlay" href="{{ asset($gallery->path) }}">
                            <div class="overlay-content">
                                <div class="post-type"><i class="icon icon-search"></i></div>
                                <h2 style="width: 98%; overflow: hidden">{{ $gallery->name }}</h2>
                                <p>{{ $gallery->describe }}</p>
                            </div><!-- overlay-content -->
                        </a><!-- overlay -->
                    </article>
                @endforeach
                <div class="shuffle-sizer three"></div>
            </div><!-- grid-items -->
            <div id="pagination">
                <ul class="clear-after reset plain">
                    <li id="older" class="pagination-nav"><a href="{!! $galleryList->previousPageUrl() !!}" class="button transparent aqua"><i class="fa fa-chevron-left"></i><span class="label">上一页</span></a></li>
                    <li id="newer" class="pagination-nav"><a href="{!! $galleryList->nextPageUrl() !!}" class="button transparent aqua"><span class="label">下一页</span><i class="fa fa-chevron-right"></i></a></li>
                </ul>
            </div>
        </div><!-- row-content -->
    </div><!-- row -->
</main><!-- main -->

@endsection
