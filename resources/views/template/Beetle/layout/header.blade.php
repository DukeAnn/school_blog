<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/13 0013
 * Time: 22:52
 */?>
<header role="banner" class="transparent light">
    <div class="row">
        <div class="nav-inner row-content buffer-left buffer-right even clear-after">
            <div id="brand">
                <h1 class="reset"><!--<img src="img/logo.png" alt="logo">--><a href="{{ url('/') }}">ADKi.me</a></h1>
            </div><!-- brand -->
            <a id="menu-toggle" href="#"><i class="fa fa-bars fa-lg"></i></a>
            <nav>
                <ul class="reset" role="navigation">
                    <li class="menu-item">
                        <a href="{{ url('/') }}">{{ $seo_index->name }}</a>
                        {{--<ul class="sub-menu">
                            <li><a href="home-01.html">Generic Home Page</a></li>
                            <li><a href="home-02.html">App Showcase</a></li>
                            <li><a href="home-03.html">App Showcase Alternative</a></li>
                        </ul>--}}
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('photography') }}">{{ $seo_photography->name }}</a>
                        {{--<ul class="sub-menu">
                            <li><a href="works-4-columns.html">Four Columns Grid Style</a></li>
                            <li><a href="works-3-columns.html">Three Columns Grid Style</a></li>
                            <li><a href="works-4-columns-alternative.html">Four Columns Mosaic Style</a></li>
                            <li><a href="works-3-columns-alternative.html">Three Columns Mosaic Style</a></li>
                            <li><a href="works-4-columns-lightbox.html">Lightbox Gallery</a></li>
                            <li><a href="single-work-post.html">Single Work Page</a></li>
                        </ul>--}}
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('blog') }}">{{ $seo_blog->name }}</a>
                       {{-- <ul class="sub-menu">
                            <li><a href="blog-4-columns-masonry.html">Four Columns Grid</a></li>
                            <li><a href="blog-list-sidebar.html">List Style with Sidebar</a></li>
                            <li><a href="single-blog-post.html">Single Post</a></li>
                            <li><a href="single-blog-post-sidebar.html">Single Post with Sidebar</a></li>
                        </ul>--}}
                    </li>
                    <li class="menu-item"><a href="http://www.adki.me" target="_blank">关于我</a></li>
                    {{--<li class="menu-item">
                        <a href="#">Features</a>
                        <ul class="sub-menu">
                            <li><a href="search.html">Search Page</a></li>
                            <li><a href="no-results.html">Search Page - No Results</a></li>
                            <li><a href="page-not-found.html">404 - Page Not Found</a></li>
                            <li>
                                <a href="#">Sub Menu</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Sub Sub Menu 01</a></li>
                                    <li><a href="#">Sub Sub Menu 02</a></li>
                                    <li><a href="#">Sub Sub Menu 03</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item"><a href="contact.html">Contact</a></li>--}}
                    @if(Auth::guest())
                    <li class="menu-item"><a href="{{ url('login') }}" style="color: rgb(18, 255, 230);">登录</a></li>
                    <li class="menu-item"><a href="{{ url('register') }}" style="color: rgb(63, 255, 51);">注册</a></li>
                    @else
                        <li class="menu-item">
                            <a href="" style="color: #FD685B;">你好，{{ Auth::user()->name }}</a>
                            <ul class="sub-menu">
                                <li><a href="{{ url('admin') }}">仪表盘</a></li>
                                <li><a href="{{ url('logout') }}">注销</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </nav>
        </div><!-- row-content -->
    </div><!-- row -->
</header>
