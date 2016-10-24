<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/9 0009
 * Time: 18:20
 */?>
@extends('layouts.admin')

@section('content')
    <script type="text/javascript">
        jQuery(document).ready(function($)
        {
            // Reveal Login form
            setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);

            // Validation and Ajax action
            $("form#cateedit").validate({
                rules: {
                    name: {
                        required: true
                    },
                },

                messages: {
                    name: {
                        required: '必须输入分类名！'
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
                    <h3 class="panel-title">编辑分类</h3>
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

                    <form role="form" id="cateedit" class="form-horizontal" action="{{ url('admin/catesave') }}" method="post">
                        {{--防跨站攻击--}}
                        {!! csrf_field() !!}
                        <input value="{{ $cate->id }}" id="id" name="id" type="hidden">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">分类名</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="field-1" value="{{ $cate->cate_name }}" >
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">别名</label>

                            <div class="col-sm-10">
                                <input type="text" name="alias" class="form-control" value="{{ $cate->alias }}" >
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">

                            <label class="col-sm-2 control-label">描述</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="describe" rows="10" >{{$cate-> describe }}</textarea>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>
                        <button type="submit" class="btn btn-info btn-single pull-right">确认修改</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection


@section('js')
    <script src="{{ asset('assets/js/jquery-validate/jquery.validate.min.js') }}"></script>
@endsection

