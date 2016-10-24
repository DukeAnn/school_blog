<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/20 0020
 * Time: 18:34
 */?>
@extends('layouts.admin')
@section('content')
<section class="profile-env">

    <div class="row">

        <div class="col-sm-3">

            <!-- User Info Sidebar -->
            <div class="user-info-sidebar">

                <a href="#" class="user-img">
                    <img src="@if($user->avatar){{ asset($user->avatar) }}@else{{ asset('assets/images/user-4.png') }}@endif" alt="user-img" class="img-cirlce img-responsive img-thumbnail" id="avatar" />
                </a>

                <a href="#" class="user-name">
                    {{ $user->name }}
                    <span class="user-status is-online"></span>
                </a>

							<span class="user-title">
								{{ $user->position }} at <strong>{{ $user->company }}</strong>
							</span>

                <hr />

                <ul class="list-unstyled user-info-list">
                    <li>
                        <i class="fa-home"></i>
                        <a href="http://{{ $user->url }}" target="_blank">个人网站</a>
                    </li>
                    <li>
                        <i class="fa-briefcase"></i>
                        {{ $user->company }}
                    </li>
                    <li>
                        <i class="fa-graduation-cap"></i>
                        {{ $user->university }}
                    </li>
                </ul>

                <hr />

                {{--<ul class="list-unstyled user-friends-count">
                    <li>
                        <span>643</span>
                        评&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;论
                    </li>
                    <li>
                        <span>108</span>
                        文&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;章
                    </li>
                </ul>--}}

                <button type="button" class="btn btn-success btn-block text-left">
                    角色：@if($user->auth == 5) 管理员 @elseif($user->auth == 2) 作者 @else 读者 @endif
                </button>
            </div>

        </div>

        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">个人资料</h3>
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

                    <form role="form" class="form-horizontal" action="{{ url('admin/user_info') }}" method="post">
                        {!! csrf_field() !!}

                        <script type="text/javascript">
                            jQuery(document).ready(function($)
                            {
                                var i = 1,
                                        $example_dropzone_filetable = $("#example-dropzone-filetable"),
                                        example_dropzone = $("#advancedDropzone").dropzone({
                                            url: '{{ url('admin/upload_avatar') }}',

                                            // Events
                                            addedfile: function(file)
                                            {
                                                if(i == 1)
                                                {
                                                    $example_dropzone_filetable.find('tbody').html('');
                                                }

                                                var size = parseInt(file.size/1024, 10);
                                                size = size < 1024 ? (size + " KB") : (parseInt(size/1024, 10) + " MB");

                                                var	$el = $('<tr><td><div class="progress progress-striped"><div class="progress-bar progress-bar-warning"></div></div></td>\
													<td>'+size+'</td>\
													<td>上传中...</td>\
												</tr>');

                                                $example_dropzone_filetable.find('tbody').append($el);
                                                file.fileEntryTd = $el;
                                                file.progressBar = $el.find('.progress-bar');
                                            },

                                            uploadprogress: function(file, progress, bytesSent)
                                            {
                                                file.progressBar.width(progress + '%');
                                            },

                                            success: function(file,date)
                                            {
                                                file.fileEntryTd.find('td:last').html('<span class="text-success">成功</span>');
                                                file.progressBar.removeClass('progress-bar-warning').addClass('progress-bar-success');
                                                $('#avatar').attr('src',date);

                                            },

                                            error: function(file)
                                            {
                                                file.fileEntryTd.find('td:last').html('<span class="text-danger">失败</span>');
                                                file.progressBar.removeClass('progress-bar-warning').addClass('progress-bar-red');
                                            }
                                        });

                                $("#advancedDropzone").css({
                                    minHeight: 200
                                });

                            });
                        </script>

                        <br />
                        <div class="row">
                            <div class="col-sm-3 text-center">
                                <div id="advancedDropzone" class="droppable-area">
                                    上传头像
                                </div>

                            </div>
                            <div class="col-sm-9">
                                <table class="table table-bordered table-striped" id="example-dropzone-filetable">
                                    <thead>
                                    <tr>
                                        <th width="40%">进度</th>
                                        <th>大小</th>
                                        <th>状态</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="5">头像上传信息</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">邮箱</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="field-1" value="{{ $user->email }}" disabled>
                                <p class="help-block">登录账号，不可修改！</p>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group has-info">
                            <label class="col-sm-2 control-label" for="field-2">用户名</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-2" name="name" value="{{ $user->name }}" placeholder="显示的昵称">
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">性别</label>

                            <div class="col-sm-10">
                                <p>
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" value="1" @if($user->sex == 1) checked @endif>
                                        男
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" value="2" @if($user->sex == 2) checked @endif>
                                        女
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="field-4">生日</label>

                            <div class="input-group input-group-minimal col-sm-5" style="padding-left: 15px;">
										<span class="input-group-addon">
											<i class="fa-calendar"></i>
										</span>
                                <input class="form-control" data-mask="date" id="field-4" type="text" name="birthday" value="{{ $user->birthday }}">
                            </div>

                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5">我的大学</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-5" value="{{ $user->university }}" name="university" placeholder="大学名称">
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-6">我的公司</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-6" value="{{ $user->company }}" name="company" placeholder="公司名称">
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-7">我的职位</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-7" name="position" value="{{ $user->position }}" placeholder="公司职位">
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-8">个人网站</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-8" name="url" value="{{ $user->url }}" placeholder="网址">
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-9">QQ</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-9" name="qq" value="{{ $user->qq }}" placeholder="QQ">
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-10">我的签名</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" cols="5" id="field-10" name="autograph">{{ $user->autograph }}</textarea>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <button class="btn btn-info" type="submit" style="float: right">更新资料</button>
                    </form>

                </div>
            </div>
        </div>

    </div>

</section>
@endsection

@section('js')
<!-- Imported styles on this page -->
<link rel="stylesheet" href="{{ asset('assets/css/fonts/elusive/css/elusive.css') }}">
<!-- Imported scripts on this page -->
<script src="{{ asset('assets/js/inputmask/jquery.inputmask.bundle.js') }}"></script>

<!-- Imported styles on this page -->
<link rel="stylesheet" href="{{ asset('assets/js/dropzone/css/dropzone.css') }}">

<!-- Imported scripts on this page -->
<script src="{{ asset('assets/js/dropzone/dropzone.min.js') }}"></script>
@endsection