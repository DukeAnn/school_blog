<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/17 0017
 * Time: 22:37
 */?>
<div class="comment-section">
    <h3 id="comments">{{ $count }} 条评论</h3>
    <ul class="comment-list plain">
        @if(!empty($commentList))
            @foreach($commentList as $comment)
                <li class="comment">
                    <input id="comment_{{ $comment['id'] }}" value="{{ $comment['id'] }}" type="hidden">
                    <div class="single-comment">
                        <div class="comment-author">
                            <img src="@if(empty($comment['avatar'])){{ asset('template/Beetle/img/default_avatar.png') }}@else{{ $comment['avatar'] }}@endif" class="avatar" alt="{{ $comment['name'] }}">
                            <cite><a href="{{ $comment['url'] }}" id="reply_{{ $comment['id'] }}">{{ $comment['name'] }}</a></cite>
                            <span class="says">says:</span>
                        </div><!-- comment-author -->
                        <div class="comment-meta">
                            <time datetime="{{ $comment['created_at'] }}">{{ $comment['created_at'] }}</time> / <a href="javascript:;" class="reply" onclick="getId({{ $comment['id'] }})" >回复</a>
                        </div><!-- comment-meta -->
                        <p>{{ $comment['comment'] }}</p>
                    </div><!-- single-comment -->
                    @if(!empty($comment['children']))
                    <ul class="children plain">
                        @foreach($comment['children'] as $value)
                        <li class="comment">
                            <input id="comment_{{ $value['id'] }}" value="{{ $comment['id'] }}" type="hidden">
                            <div class="single-comment">
                                <div class="comment-author">
                                    <img src="@if(empty($value['avatar'])){{ asset('template/Beetle/img/default_avatar.png') }}@else{{ $value['avatar'] }}@endif" class="avatar" alt="{{ $value['name'] }}">
                                    <cite><a href="{{ $value['url'] }}" id="reply_{{ $value['id'] }}">{{ $value['name'] }}</a></cite>
                                    <span class="says">says:</span>
                                </div><!-- comment-author -->
                                <div class="comment-meta">
                                    <time datetime="{{ $value['created_at'] }}">{{ $value['created_at'] }}</time> / <a href="javascript:;" class="reply" onclick="getId({{ $value['id'] }})">回复</a>
                                </div><!-- comment-meta -->
                                <p>{{ $value['comment'] }}</p>
                            </div><!-- single-comment -->
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
            @endforeach
        @endif
    </ul>
</div><!-- comment-section -->
<div id="post-comment" class="clear-after">
    <h3 id="reply-title">发表评论</h3>
    <p class="comment-note">电子邮箱会被保密，不被公布</p>
    <form class="comment-form" id="comment" action="{{ url('comment') }}" method="post">
        {!! csrf_field() !!}
        <input value="{{ $post->id }}" name="post_id" type="hidden">
        <input value="@if(Auth::user()){{ Auth::user()->id }}@endif" name="user_id" type="hidden">
        <input value="{{ $post->user_id }}" name="send_user_id" type="hidden">
        <input value="" name="parent_id" id="parent_id" type="hidden">

        <input value="{{ $post->id }}" type="hidden">
        <span class="pre-input"><i class="icon icon-flag"></i></span>
        <input class="name plain buffer" value="{{ $post->user_name }}" type="text" id="reply_name" readonly>
        <span class="pre-input"><i class="icon icon-user"></i></span>
        <input class="name plain buffer" value="@if(Auth::user()){{ Auth::user()->name }}@endif" name="name" type="text" placeholder="昵称">
        <span class="pre-input"><i class="icon icon-email"></i></span>
        <input class="email plain buffer" value="@if(Auth::user()){{ Auth::user()->email }}@endif" name="email" type="email" placeholder="Email">
        <span class="pre-input"><i class="icon icon-globe"></i></span>
        <input class="name plain buffer" value="@if(Auth::user()){{ Auth::user()->url }}@endif" name="url" type="text" placeholder="个人网站">
        <textarea class="plain buffer" name="comment" placeholder="别忘了发表自己的观点"></textarea>
        <input class="plain button red" type="submit" value="来一发">
    </form>
</div><!-- post-comment -->

<script type="text/javascript">
    function getId(id) {
        var comment_id = $('#comment_'+id).val();
        var reply_name = $('#reply_'+id).text();
        $('#parent_id').val(comment_id);
        $('#reply_name').val(reply_name);
    }
    jQuery(function ($) {
        $("form#comment").validate({
            rules: {
                email: {
                    required: true
                },

                name: {
                    required: true
                },
                comment: {
                    required: true
                }
            },

            messages: {
                email: {
                    required: '必须输入邮箱！'
                },

                name: {
                    required: '必须输入昵称！'
                },
                comment: {
                    required: '请输入评论内容'
                }
            },

            // Form Processing via AJAX
            //通过验证后执行的函数
            submitHandler: function(form)
            {
                show_loading_bar(70); // Fill progress bar to 70% (just a given value)
                $(form).submit();
                show_loading_bar(100);
            }
        });
    });
</script>
