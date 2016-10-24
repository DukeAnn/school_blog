<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/16 0016
 * Time: 15:00
 */?>
@extends('template.Beetle.layout.layout')
@section('header')
    <title>{{ $seo_index->name." - ".config('blog.powered') }}</title>
    <meta name="keywords" content="{{ $seo_index->keyword }}">
    <meta name="description" content="{{ $seo_index->describe }}" >
@endsection
@section('content')
    <body class="page">

    @include('template.Beetle.layout.header')

    <main role="main">
        {{--头幻灯--}}
        @include('template.Beetle.layout.slide')

        <div id="main">

            <section class="row section call-to-action">
                <div class="row-content buffer even">
                    <p>精心设计的人性化博客系统</p>
                    <a class="button red" href="{{ url('blog') }}">查看博客</a>
                </div>
            </section>

            <section class="row section">
                <div class="row-content buffer even clear-after">
                    <div class="column four">
                        <div class="small-icon red"><i class="icon icon-paperfly"></i></div>
                        <div class="small-icon-text clear-after">
                            <h4>SEO</h4>
                            <p class="text-xs">更好的SEO优化，友好的关键词，描述后台设置，让网站搜索排名更加靠前，获得更多的用户。</p>
                        </div>
                    </div>
                    <div class="column four">
                        <div class="small-icon red"><i class="icon icon-diamond"></i></div>
                        <div class="small-icon-text clear-after">
                            <h4>Laravel</h4>
                            <p class="text-xs">采用PHP国际流行排名第一的laraval框架开发，一个为艺术家而生的框架，更加完美的安全机制，MVC框架减少代码冗余。</p>
                        </div>
                    </div>
                    <div class="column four last">
                        <div class="small-icon red"><i class="icon icon-crown"></i></div>
                        <div class="small-icon-text clear-after">
                            <h4>PHP</h4>
                            <p class="text-xs">采用流行网页语言PHP开发，PHP具有了公认的安全性能。开源造就了强大，稳定，成熟的系统。</p>
                        </div>
                    </div>
                    <div class="column four">
                        <div class="small-icon red"><i class="icon icon-tablet"></i></div>
                        <div class="small-icon-text clear-after">
                            <h4>自适应</h4>
                            <p class="text-xs">HTML5+CSS3构建的自适应前端页面，让网站的用户不止于PC，而是多终端皆可访问的自适应页面。</p>
                        </div>
                    </div>
                    <div class="column four">
                        <div class="small-icon red"><i class="icon icon-megaphone"></i></div>
                        <div class="small-icon-text clear-after">
                            <h4>Blog</h4>
                            <p class="text-xs">采用艺术的审美设计，午茶风的格调，让博客更加温馨惬意，UI设计贴合大众的审美观浑然天成。</p>
                        </div>
                    </div>
                    <div class="column four last">
                        <div class="small-icon red"><i class="icon icon-multiview"></i></div>
                        <div class="small-icon-text clear-after">
                            <h4>多层CSS</h4>
                            <p class="text-xs">多层的CSS设计，让网页加载速度更快，性能更加优越，提升用户体验，为网站增加更多的用户。</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="row section">
                <div class="row-content buffer even clear-after">
                    <div class="column six">
                        <h2>移动APP</h2>
                        <p>让网站成为一个移动的APP，丢掉那些冗余的客户端吧！自适应网站设计，可一个站点面对多终端，让用户少去下载APP的烦恼。</p>
                        {{--<p><em>- Courtesy of <a href="http://dribbble.com/sok" target="_blank">Simeon K.</a>.</em></p>--}}
                        <a class="button transparent aqua" href="#">Explore</a>
                    </div>
                    <div class="side-mockup right-mockup animation">
                        <div class="slider ipad-slider grey" data-autoplay="false">
                            <figure>
                                <div><img src="{{ asset('template/Beetle/img/ipad-white.jpg') }}" alt=""></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </section>

            <section class="row section">
                <div class="row-content buffer even clear-after">
                    <div class="column six push-six last-special">
                        <h2>友好的SEO</h2>
                        <p>完美的基础SEO优化、首页关键字和描述自定义,让那个网站更符合搜索引擎的爬取，获得最佳的搜索排名。</p>
                        {{--<p><em>- Courtesy of <a href="http://dribbble.com/sok" target="_blank">Simeon K.</a>.</em></p>--}}
                        <a class="button transparent aqua" href="#">Explore</a>
                    </div>
                    <div class="side-mockup left-mockup animation">
                        <div class="slider desktop-slider" data-autoplay="3000">
                            <figure>
                                <div><img src="{{ asset('template/Beetle/img/pc-1.jpg') }}" alt=""></div>
                                <div><img src="{{ asset('template/Beetle/img/pc-2.jpg') }}" alt=""></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </section>

            <section class="row section text-light" style="background-color:#4FCEAD;">
                <div class="row-content buffer even clear-after">
                    <div class="slogan animation">
                        <h2>接近完美的手机端自适应</h2>
                        <p>任何地方都能阅读博客</p>
                    </div><!-- slogan -->
                </div>
            </section>

            <section class="row section">
                <div class="row-content buffer even clear-after">
                    <div class="slider iphone-slider grey" data-autoplay="3000">
                        <figure>
                            <div><img src="{{ asset('template/Beetle/img/mobile-1.png') }}" alt=""></div>
                            <div><img src="{{ asset('template/Beetle/img/mobile-2.png') }}" alt=""></div>
                            <div><img src="{{ asset('template/Beetle/img/mobile-3.png') }}" alt=""></div>
                            <div><img src="{{ asset('template/Beetle/img/mobile-4.png') }}" alt=""></div>
                            <div><img src="{{ asset('template/Beetle/img/mobile-5.png') }}" alt=""></div>
                            <div><img src="{{ asset('template/Beetle/img/mobile-6.png') }}" alt=""></div>
                        </figure>
                    </div>
                </div>
            </section>

            <section class="row section text-light" style="background-color:#4FC1E9;">
                <div class="row-content buffer even clear-after">
                    <div class="section-title"><h3>作者简介</h3></div>
                    <div class="testimonial-slider" data-autoplay="5000" data-pagination="true" data-transition="fade" data-autoheight="false">
                        <div class="quote">
                            <div class="column two">
                                <figure class="testimonial-img">
                                    <img src="{{ $admin->avatar }}" alt="">
                                </figure>
                            </div><!-- column -->
                            <div class="column ten last">
                                <p>"{{ $admin->autograph }}"</p>
                                <div class="author">{{ $admin->name }}</div>
                            </div><!-- column -->
                        </div><!-- quote -->
                  {{--      <div class="quote">
                            <div class="column two">
                                <figure class="testimonial-img">
                                    <img src="http://placehold.it/600x600/ddd/fff&text=Beetle%20image" alt="">
                                </figure>
                            </div><!-- column -->
                            <div class="column ten last">
                                <p>"Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy."</p>
                                <div class="author">Fabrizio De Andr&egrave;</div>
                            </div><!-- column -->
                        </div><!-- quote -->
                        <div class="quote">
                            <div class="column two">
                                <figure class="testimonial-img">
                                    <img src="http://placehold.it/600x600/ddd/fff&text=Beetle%20image" alt="">
                                </figure>
                            </div><!-- column -->
                            <div class="column ten last">
                                <p>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour."</p>
                                <div class="author">B.B. King</div>
                            </div><!-- column -->
                        </div><!-- quote -->--}}
                    </div><!-- testimonial-slider -->
                </div>
            </section>

            <section class="row section call-to-action">
                <div class="row-content buffer even animation">
                    <p>查看作者个人网站</p>
                    <a class="button red" href="http://www.adki.me" target="_blank">ADKi</a>
                </div>
            </section>

        </div><!-- id-main -->
    </main><!-- main -->



@endsection
