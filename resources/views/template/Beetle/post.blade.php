<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/17 0017
 * Time: 16:50
 */?>
@extends('template.Beetle.layout.layout')

@section('header')
    <title>{{ $post->title.' - '.config('blog.title') }}</title>

@endsection
@section('content')
<body class="single single-post">

@include('template.Beetle.layout.header')

<main role="main">
@include('template.Beetle.layout.postheader')

    <div id="main" class="row">
        <div class="row-content buffer-left buffer-right buffer-bottom">
            <div id="post-nav">
                <ul class="clear-after reset plain">
                    <li id="prev-items" class="post-nav"><a href="javascript:;" onclick="javascript:history.back(-1);"><i class="fa fa-chevron-left"></i><span class="label">返回</span></a>
                    </li>
                    <li id="all-items" class="post-nav"><a href="{{ url('blog') }}"><i class="icon icon-images"></i></a>
                    </li>
                    {{--<li id="next-items" class="post-nav"><a href="#"><span class="label">下一篇</span><i class="fa fa-chevron-right"></i></a>
                    </li>--}}
                </ul>
            </div>

            <div class="post-area clear-after">
                <article role="main">
                    <h5 class="meta-post">
                        @foreach($post->cates as $key => $value)
                            @foreach($post->cate_ids as $key_id => $value_id)
                                @if($key == $key_id)
                                    <a href="javascript:;" target="_blank">{{ $value }}</a>&nbsp;
                                @endif
                            @endforeach
                        @endforeach
                        -
                        <time datetime="{{ $post->created_at }}">{{ $post->created_at }}</time>
                    </h5>
                    <h1>{{ $post->title }}</h1>
                    {!! $post->content !!}
                </article>

            </div><!-- post-area -->

            <div class="meta-social">
                {{--<ul class="inline center">
                    <li><a href="#" class="twitter-share border-box"><i class="fa fa-twitter fa-lg"></i></a></li>
                    <li><a href="#" class="facebook-share border-box"><i class="fa fa-facebook fa-lg"></i></a></li>
                    <li><a href="#" class="pinterest-share border-box"><i class="fa fa-pinterest fa-lg"></i></a></li>
                </ul>--}}
            </div>
            @if(!empty($related_articles))
            <div class="related clear-after">
                <h4>更多文章</h4>
                @foreach($related_articles as $key => $value)
                        <div class="item @if($key == 2) {{ 'last' }} @endif">
                            <figure><img src="@if(!empty($value->pic)){{ $value->pic }}@else{{ asset('template/Beetle/img/post_default.jpg') }}@endif" height="321" width="321" alt="{{ $value->title }}"></figure>
                            <a class="overlay" href="{{ url('post/').'/'.$value->id }}">
                                <div class="overlay-content">
                                    <div class="post-type"><i class="icon icon-search"></i></div>
                                    <h2>{{ $value->title }}</h2>
                                    <p>{!! str_limit($value->describe) !!}</p>
                                </div><!-- overlay-content -->
                            </a><!-- overlay -->
                        </div>
                @endforeach
            </div>
            @endif
            {{--引入评论--}}
           @include('template.Beetle.layout.post_comment')

        </div><!-- row-content -->
    </div><!-- row -->
</main><!-- main -->
@endsection

@section('footer')

@endsection
