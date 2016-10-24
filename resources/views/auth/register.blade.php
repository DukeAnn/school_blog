<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/6 0006
 * Time: 22:43
 */?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />

    <title>Xenon - Login</title>

    <link rel="stylesheet" href="http://fonts.lug.ustc.edu.cn/css?family=Arimo:400,700,400italic">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/linecons/css/linecons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/xenon-core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/xenon-forms.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/xenon-components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/xenon-skins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('assets/js/respond.min.js') }}"></script>
    <![endif]-->


</head>
<body class="page-body login-page">


<div class="login-container">

    <div class="row">

        <div class="col-sm-6">

            <script type="text/javascript">
                jQuery(document).ready(function($)
                {
                    // Reveal Login form
                    setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);

                    // Validation and Ajax action
                    $("form#login").validate({
                        rules: {
                            name:{
                                required: true,
                                minlength: 2
                            },
                            email: {
                                required: true,
                                email: true
                            },

                            password: {
                                required: true,
                                minlength: 5
                            },
                            password_confirmation: {
                                required: true,
                                minlength: 5,
                                equalTo: "#password"
                            },
                        },


                        messages: {
                            name:{
                                required: '必须输入用户名！',
                                minlength: "用户名必需由两个字母以上组成"
                            },
                            email: {
                                required: '必须输入邮箱！',
                                email: "请输入一个正确的邮箱",
                            },

                            password: {
                                required: "请输入密码",
                                minlength: "密码长度不能小于 5 个字母"
                            },
                            password_confirmation: {
                                required: "请输入密码",
                                minlength: "密码长度不能小于 5 个字母",
                                equalTo: "两次密码输入不一致"
                            },
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

                    // Set Form focus
                    $("form#login .form-group:has(.form-control):first .form-control").focus();
                });
            </script>

            <!-- Errors container -->
            @if ($errors->has('email'))
                <script style="text/javascript">
                    $(function () {
                        var opts = {
                            "closeButton": true,
                            "debug": false,
                            "positionClass": "toast-top-full-width",
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };
                        toastr.error("{{ $errors->first('email') }}", "注册警告！", opts);
                        $password.select();
                    });
                </script>
                <div class="errors-container">

                </div>
                @endif

                        <!-- Add class "fade-in-effect" for login form effect -->
                <form method="post" role="form" id="login" action="{{ url('/register') }}" class="login-form fade-in-effect">
                    {{--防止csrf攻击--}}
                    {!! csrf_field() !!}
                    <div class="login-header">
                        <a href="{{ url('/register') }}" class="logo">
                            <img src="assets/images/logo@2x.png" alt="" width="80" />
                            <span>注 册</span>
                        </a>

                        <p>请注册！</p>
                    </div>


                    <div class="form-group">
                        <label class="control-label" for="name">用户名</label>
                        <input type="text" class="form-control input-dark" name="name" id="name" value="{{ old('name') }}" autocomplete="off" />
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="email">邮箱</label>
                        <input type="email" class="form-control input-dark" name="email" id="email" value="{{ old('email') }}" autocomplete="off" />
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="password">密码</label>
                        <input type="password" class="form-control input-dark" name="password" id="password" autocomplete="off" />
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="password_confirmation">重复密码</label>
                        <input type="password" class="form-control input-dark" name="password_confirmation" id="password_confirmation" autocomplete="off" />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-dark  btn-block text-left">
                            <i class="fa-lock"></i>
                            注 册
                        </button>
                    </div>

                    <div class="login-footer">
                        <a href="{{ url('/password/email') }}">忘记密码？</a>

                        <div class="info-links">
                            <a href="#">ToS</a> -
                            <a href="{{ url('/login') }}">马上登陆</a>
                        </div>

                    </div>

                </form>


        </div>

    </div>

</div>



<!-- Bottom Scripts -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/js/resizeable.js') }}"></script>
<script src="{{ asset('assets/js/joinable.js') }}"></script>
<script src="{{ asset('assets/js/xenon-api.js') }}"></script>
<script src="{{ asset('assets/js/xenon-toggles.js') }}"></script>
<script src="{{ asset('assets/js/jquery-validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/toastr/toastr.min.js') }}"></script>


<!-- JavaScripts initializations and stuff -->
<script src="{{ asset('assets/js/xenon-custom.js') }}"></script>

</body>
</html>
