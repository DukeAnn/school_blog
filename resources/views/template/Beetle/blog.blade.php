<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/16 0016
 * Time: 15:11
 */?>
@extends('template.Beetle.layout.layout')

@section('header')
    <title>{{ $seo_blog->name." - ".config('blog.powered') }}</title>
    <meta name="keywords" content="{{ $seo_blog->keyword }}">
    <meta name="description" content="{{ $seo_blog->describe }}" >

    <style>
       /* .page_list {
            text-align:center;
            position: relative;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        .page_list ul {
            display:inline;
            list-style:none;
            margin: 0 auto;
            padding: 0px;
            position: relative;
        }
        .page_list li {
            display:inline;
            line-height:40px;
            margin: 5px;
        }*/
    </style>
@endsection

@section('content')
    <body class="blog masonry-style">
    @include('template.Beetle.layout.header')
    <main role="main">
      @include('template.Beetle.layout.blogheader')

        <div id="main" class="row">
            <div class="row-content buffer clear-after">
                <div class="grid-items preload">
                    @foreach($posts as $key => $post)
                        @if($key == 0 || $key == 5)
                            <article class="item column six">
                                <a href="{{ url('post/').'/'.$post->id }}">
                                    <figure>
                                        <img src="@if(!empty($post->pic)){{ $post->pic }}@else{{ asset('template/Beetle/img/post_default.jpg') }}@endif" alt="{{ $post->title }}">
                                        <span class="blog-overlay"><i class="icon icon-{!! $post->ico !!}"></i></span>
                                    </figure>
                                    <div class="blog-excerpt">
                                        <div class="blog-excerpt-inner">
                                            <h5 class="meta-post" style="width: 95%; overflow: hidden">
                                                @foreach($post->cates as $key => $value)
                                                    @foreach($post->cate_ids as $key_id => $value_id)
                                                        @if($key == $key_id)
                                                        <a href="javascript:;" target="_blank">{{ $value }}</a>&nbsp;
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </h5>
                                            <h2>{{ $post->title }}</h2>
                                        </div><!-- blog-excerpt -->
                                    </div><!-- blog-excerpt-inner -->
                                </a>
                            </article>
                        @else
                            <article class="item column three">
                                <a href="{{ url('post/').'/'.$post->id }}">
                                    <figure>
                                        <img src="@if(!empty($post->pic)){{ $post->pic }}@else{{ asset('template/Beetle/img/post_default.jpg') }}@endif" alt="{{ $post->title }}">
                                        <span class="blog-overlay"><i class="icon icon-{!! $post->ico !!}"></i></span>
                                    </figure>
                                    <div class="blog-excerpt">
                                        <div class="blog-excerpt-inner">
                                            <h5 class="meta-post" style="width: 95%; overflow: hidden">
                                                @foreach($post->cates as $key => $value)
                                                    @foreach($post->cate_ids as $key_id => $value_id)
                                                        @if($key == $key_id)
                                                            <a href="javascript:;" target="_blank">{{ $value }}</a>&nbsp;
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </h5>
                                            <h2 style="height: 18px; overflow: hidden">{{ $post->title }}</h2>
                                            <p>{!! str_limit($post->describe,120) !!}</p>
                                        </div><!-- blog-excerpt-inner -->
                                    </div><!-- blog-excerpt -->
                                </a>
                            </article>
                        @endif
                    @endforeach

                    <div class="shuffle-sizer three"></div>
                </div><!-- grid-items -->
                <div id="pagination">
                    <ul class="clear-after reset plain">
                        <li id="older" class="pagination-nav"><a href="{!! $posts->previousPageUrl() !!}" class="button transparent aqua" rel="prev"><i class="fa fa-chevron-left"></i><span class="label">上一页</span></a></li>
                        <li id="newer" class="pagination-nav"><a href="{!! $posts->nextPageUrl() !!}" class="button transparent aqua" rel="next"><span class="label">下一页</span><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                    {{--自带分页--}}
                 {{--   {!! $posts->links() !!}--}}
                </div>

            </div><!-- row-content -->
        </div><!-- row -->
    </main><!-- main -->
@endsection
