<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/13 0013
 * Time: 22:52
 */?>
<footer role="contentinfo">
    <div class="row">
        <div class="row-content buffer clear-after">
            <section id="top-footer">
                <div class="widget column three"><!-- la class="widget" è forse generata utomaticamente da wp -->
                    <h4>导航</h4>
                    <ul class="plain">
                        <li><a href="{{ url('/') }}">{{ $seo_index->name }}</a></li>
                        <li><a href="{{ url('photography') }}">{{ $seo_photography->name }}</a></li>
                        <li><a href="{{ url('blog') }}">{{ $seo_blog->name }}</a></li>
                        <li><a href="http://adki.me" target="_blank">关于我</a></li>
                        <li><a href="https://laravel.com/">laravel</a></li>
                    </ul>
                </div>
                <div class="widget column three">
                    <h4>友情链接</h4>
                    @if(!empty($links))
                    <ul class="plain">
                      @foreach($links as $key => $value)
                            <li><a href="{{ $value->url }}" target="_blank">{{ $value->name }}</a></li>
                      @endforeach
                    </ul>
                    @endif
                </div>
                <div class="widget column three">
                    <h4>签名</h4>
                    <p>做一个优雅的程序员。不喜不悲，一个字母一个字母的敲。</p>
                </div>
            </section><!-- top-footer -->
            <section id="bottom-footer">
                <p class="keep-left">&copy; 2016 <a href="http://adki.me/" target="_blank" alt="adki.me">adki.me</a>. All Rights Reserved.</p>
                <p class="keep-right">本网站由adk制作完成，天津城建大学2016毕业设计</p>
            </section><!-- bottom-footer -->
        </div><!-- row-content -->
    </div><!-- row -->
</footer>
