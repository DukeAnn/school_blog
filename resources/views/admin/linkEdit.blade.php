<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/5/3 0003
 * Time: 22:52
 */?>
@extends('layouts.admin')

@section('content')
    <script type="text/javascript">
        jQuery(document).ready(function($)
        {
            // Reveal Login form
            setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);

            // Validation and Ajax action
            $("form#cateadd").validate({
                rules: {
                    name: {
                        required: true
                    },
                    url: {
                        required: true
                    },
                },

                messages: {
                    name: {
                        required: '必须输入链接名！'
                    },
                    url: {
                        required: '必须输入url！'
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
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">添加友链</h3>
                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">&ndash;</span>
                            <span class="expand-icon">+</span>
                        </a>
                        <a href="#" data-toggle="remove">
                            &times;
                        </a>
                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" id="cateadd" class="form-horizontal" action="{{ url('admin/linkadd') }}" method="post">
                        {{--防跨站攻击--}}
                        {!! csrf_field() !!}
                        <input value="{{ $link->id }}" id="id" name="id" type="hidden">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">链接名</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="field-1" value="{{ $link->name }}" >
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">链接地址</label>

                            <div class="col-sm-10">
                                <input type="text" name="url" class="form-control" value="{{ $link->url }}" >
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <button type="submit" class="btn btn-info btn-single pull-right">更新友链</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/jquery-validate/jquery.validate.min.js') }}"></script>
@endsection

