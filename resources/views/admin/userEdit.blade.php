<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/6 0006
 * Time: 23:29
 */?>
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">编辑用户权限</h3>
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

                <form role="form" class="form-horizontal" action="{{ url('admin/authsave') }}" method="post">
                    {{--防跨站攻击--}}
                    {!! csrf_field() !!}
                    <input value="{{ $userInfo->id }}" id="id" name="id" type="hidden">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-1">用户名</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="field-1" placeholder="{{ $userInfo->name }}" disabled>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">邮箱</label>

                        <div class="col-sm-10">
                            <input type="email" class="form-control" placeholder="{{ $userInfo->email }}" disabled>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">

                        <label class="col-sm-2 control-label">用户权限</label>
                        <input value="{{ $userInfo->auth }}" id="auth_num" type="hidden">
                        <div class="col-sm-10">
                            <select class="form-control" name="auth" id="auth">
                                <option value="0">读者</option>
                                <option value="1">作者</option>
                                <option value="5">管理员</option>
                            </select>
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
    <script>
        $(function () {
            var authNum = $('#auth_num').val();
//            var text = $("#auth option[value='"+authNum+"']").text();
//            $("#auth option").text(text)
            $("#auth option[value='"+authNum+"']").attr("selected",true);
        })
    </script>
@endsection
