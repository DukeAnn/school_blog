<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/7 0007
 * Time: 18:44
 */?>
@extends('layouts.admin')
@section('css')
    {{--引入富文本样式编辑器--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('editor/dist/css/wangEditor.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">发表文章</h3>
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

                    <form role="form" class="form-horizontal" action="{{ url('admin/postsave') }}" method="post">
                        {{--防跨站攻击--}}
                        {!! csrf_field() !!}
                        {{--标题--}}
                        <input value="" id="id" name="id" type="hidden">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">标题</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" id="field-1" placeholder="" >
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">短链接</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="slug" id="field-1" placeholder="" >
                            </div>
                        </div>

                        <div class="form-group-separator"></div>
                        {{--ICO图标--}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">文章类型</label>

                            <script type="text/javascript">
                                jQuery(document).ready(function($)
                                {
                                    $("#sboxit-2").selectBoxIt({
                                        showFirstOption: false
                                    }).on('open', function()
                                    {
                                        // Adding Custom Scrollbar
                                        $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                    });
                                });
                            </script>
                            <div class="col-sm-10">
                            <select class="form-control col-sm-10" id="sboxit-2" name="ico">
                                <option>选择类型</option>
                                <option value="doc">文章</option>
                                <option value="headphones">音乐</option>
                                <option value="picture">图片</option>
                                <option value="facetime-video">视频</option>
                            </select>
                            </div>

                        </div>

                        <div class="form-group-separator"></div>
                        {{--分类--}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">分类</label>


                            <script type="text/javascript">
                                jQuery(document).ready(function($)
                                {
                                    $("#s2example-2").select2({
                                        placeholder: '选择文章分类',
                                        allowClear: true
                                    }).on('select2-open', function()
                                    {
                                        // Adding Custom Scrollbar
                                        $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                                    });

                                });
                            </script>
                            <div class="col-sm-10">
                                <select class="form-control" id="s2example-2" name="cate_id[]" multiple>
                                <option></option>
                                <optgroup label="文章分类">
                                    @foreach($cateList as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->cate_name }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            </div>

                        </div>

                        <div class="form-group-separator"></div>
                        {{--标签--}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="tagsinput-1">标签</label>

                            <script type="text/javascript">
                                jQuery(document).ready(function($)
                                {
                                    var i = -1,
                                            colors = ['primary', 'secondary', 'red', 'blue', 'warning', 'success', 'purple'];

                                    colors = shuffleArray(colors);

                                    $("#tagsinput-2").tagsinput({
                                        tagClass: function()
                                        {
                                            i++;
                                            return "label label-" + colors[i%colors.length];
                                        }
                                    });
                                });

                                // Just for demo purpose
                                function shuffleArray(array)
                                {
                                    for (var i = array.length - 1; i > 0; i--)
                                    {
                                        var j = Math.floor(Math.random() * (i + 1));
                                        var temp = array[i];
                                        array[i] = array[j];
                                        array[j] = temp;
                                    }
                                    return array;
                                }
                            </script>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="tags" id="tagsinput-2" value="" />
                                </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">文章内容</label>

                            <div class="col-sm-10" >
                                <textarea id="editor" style="height:400px;" name="content" id="content"></textarea>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <button type="submit" class="btn btn-info btn-single pull-right">发布文章</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
    <!--这里引用jquery和wangEditor.js-->


@endsection
@section('js')
    {{--引用plupload.full.min.js--}}
    <script type="text/javascript" src="{{ asset('plupload/plupload.full.min.js') }}"></script>
    {{--引入富文本编辑器--}}
    <script type="text/javascript" src="{{ asset('editor/dist/js/wangEditor.min.js') }}"></script>

    <script type="text/javascript">
        var editor = new wangEditor('editor');

        // 上传图片
        editor.config.uploadImgUrl = '{{ url('admin/upload/image') }}';

        editor.create();
    </script>

    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="{{ asset('assets/js/daterangepicker/daterangepicker-bs3.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/select2/select2-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/multiselect/css/multi-select.css') }}">

    <script src="{{ asset('assets/js/moment.min.js') }}"></script>


    <!-- Imported scripts on this page -->
    <script src="{{ asset('assets/js/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/selectboxit/jquery.selectBoxIt.min.js') }}"></script>
    <script src="{{ asset('assets/js/tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/handlebars.min.js') }}"></script>
    <script src="{{ asset('assets/js/multiselect/js/jquery.multi-select.js') }}"></script>
@endsection
