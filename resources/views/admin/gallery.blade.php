<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/13 0013
 * Time: 21:43
 */?>
@extends('layouts.admin')

@section('content')
<script type="text/javascript">
    // Sample Javascript code for this page
    jQuery(document).ready(function($)
    {
        // 编辑
        $('.gallery-env a[data-action="edit"]').on('click', function(ev)
        {
            ev.preventDefault();
            var path = $(this).attr('href');
            $('#show_image').attr('src',path);
            $('#gallery_url').val(path);
            var id = $(this).attr('gallery');
            $('#gallery_id').val(id);
            var name = $(this).attr('getname');
            $('#gallery_name').val(name);
            var describe = $(this).attr('getdescribe');
            $('#gallery_describe').text(describe);
            $("#gallery-image-modal").modal('show');
        });

        //删除
        $('.gallery-env a[data-action="trash"]').on('click', function(ev)
        {
            ev.preventDefault();
            var id = $(this).attr('galleryid');
            $('#delete_gallery').attr('galleryid',id);
            $("#gallery-image-delete-modal").modal('show');
        });

        $('#save').click(function(){
            $('form#save_name').submit();
        });

        $('#delete_gallery').click(function(ev){
            var id = $('#delete_gallery').attr('galleryid');
            $.get('{{ url('admin/gallery/delete') }}',
                    {id: id,},
                    function(data,status){
                        if(data==true){
                            console.log(data);
                            ev.preventDefault();
                            $('#modal_hide').click();
                            var opts = {
                                "closeButton": true,
                                "debug": false,
                                "positionClass": "toast-bottom-right",
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

                            toastr.success("通知", "成功删除图片", opts);
                            $('#gallery_del_'+id).remove();

                        }else {
                            $('#modal_hide').click();
                            alert('删除失败');
                        }
                    });
        });
    });
</script>

<section class="gallery-env">

    <div class="row">

        <!-- Gallery Album Optipns and Images -->
        <div class="col-sm-9 gallery-right">

            <!-- Album Header -->
            <div class="album-header">
                <h2>媒体库</h2>
                {{--<ul class="album-options list-unstyled list-inline">
                    <li>
                        <a href="#">
                            <i class="fa-upload"></i>
                            上传图片
                        </a>
                    </li>
                </ul>--}}
            </div>

            <!-- Album Images -->
            <div class="album-images row">

                @foreach($galleryList as $gallery)
                        <!-- Album Image -->
                <div class="col-md-3 col-sm-4 col-xs-6" id="gallery_del_{{ $gallery->id }}">
                    <div class="album-image">
                        <a href="{{ asset($gallery->path) }}" class="thumb" gallery="{{ $gallery->id }}" getname="{{ $gallery->name }}" getdescribe="{{ $gallery->describe }}" style="height: 200px;" data-action="edit">
                            <img src="{{ asset($gallery->path) }}" width="200" height="150" class="img-responsive" />
                        </a>

                        <a href="#" class="name">
                            <span>{{ $gallery->name }}</span>
                            <em>{{ $gallery->created_at }}</em>
                        </a>

                        <div class="image-options">
                            <a href="{{ asset($gallery->path) }}" gallery="{{ $gallery->id }}" getname="{{ $gallery->name }}" getdescribe="{{ $gallery->describe }}" data-action="edit"><i class="fa-pencil"></i></a>
                            <a href="#" galleryid="{{ $gallery->id }}" data-action="trash"><i class="fa-trash"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <button class="btn btn-white btn-block" style="width: 49%;float: left" onclick="window.location.href='{!! $galleryList->previousPageUrl() !!}'">
                <i class="fa-step-backward"></i>
                上一页
            </button>
            <button class="btn btn-white btn-block" style="width: 49%; margin-top: 0px; float: right" onclick="window.location.href='{!! $galleryList->nextPageUrl() !!}'">
                下一页
                <i class="fa-step-forward"></i>
            </button>


        </div>

        <!-- Gallery Sidebar -->
        <div class="col-sm-3 gallery-left">

            <div class="gallery-sidebar">

                <a href="javascript:;" onclick="jQuery('#modal-6').modal('show', {backdrop: 'static'});" class="btn btn-block btn-secondary btn-icon btn-icon-standalone btn-icon-standalone-right">
                    <i class="linecons-photo"></i>
                    <span>创建相册</span>
                </a>

                <ul class="list-unstyled">
                    @foreach($galleryCateList as $cate)
                        <li @if($cate->id == $cate_id) class="active" @endif>
                            <a href="{{ url('admin/gallery/id').'/'.$cate->id }}">
                                <i class="fa-folder-open-o"></i>
                                <span>{{ $cate->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>

        </div>

    </div>

</section>

@endsection

@section('js')
        <!-- Gallery Modal Image -->
<div class="modal fade" id="gallery-image-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-gallery-image">
                <img src="" class="img-responsive" id="show_image"/>
            </div>
            <form method="post" id="save_name" action="{{ url('admin/gallery/save') }}">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="field-1" class="control-label">标题</label>

                                {!! csrf_field() !!}
                                <input hidden name="id" id="gallery_id" value="">
                                <input type="text" class="form-control" id="gallery_name" name="name" value="" placeholder="图片名称">


                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="field-1" class="control-label">图片外链</label>
                            <input name="url" id="gallery_url" class="form-control" value="" readonly>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label class="control-label">所属相册</label>
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
                            <div class="col-sm-12">
                                <select class="form-control col-sm-12" id="sboxit-2" name="cate_id">
                                    <option>选择相册</option>
                                    @foreach($galleryCateList as $cate)
                                            <option value="{{ $cate->id }}" @if($cate->id == $cate_id) selected="selected" @endif>{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="field-1" class="control-label">描述</label>
                            <textarea class="form-control autogrow" id="gallery_describe" name="describe" placeholder="图片描述" style="min-height: 80px;"></textarea>
                        </div>

                    </div>
                </div>
            </div>
            </form>
            <div class="modal-footer modal-gallery-top-controls">
                <button type="button" class="btn btn-xs btn-white" data-dismiss="modal">关闭</button>
                {{--<button type="button" class="btn btn-xs btn-info">裁剪</button>--}}
                <button type="button" class="btn btn-xs btn-secondary" id="save">保存</button>
            </div>
        </div>
    </div>
</div>



<!-- Gallery Delete Image (Confirm)-->
<div class="modal fade" id="gallery-image-delete-modal" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">确认删除图片</h4>
            </div>
            <div class="modal-body">
                你真的想删除这张图片吗
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" id="modal_hide" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-danger" id="delete_gallery" gallerid="">删除</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 6 (Long Modal)-->
<div class="modal fade" id="modal-6">
    <div class="modal-dialog">
        <form method="post" action="{{ url('admin/gallery_cate') }}">
            {!! csrf_field() !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">创建新相册</h4>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="field-1" class="control-label">相册名</label>

                                <input type="text" class="form-control" name="cate_name" id="field-1" placeholder="我的相册">
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="field-2" class="control-label">别名</label>

                                <input type="text" class="form-control" name="cate_alias" id="field-2" placeholder="短链接">
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group no-margin">
                                <label for="field-7" class="control-label">相册描述</label>
                                <textarea class="form-control autogrow" name="cate_describe" id="field-7" placeholder="关于相册的内容"></textarea>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-info">创建</button>
                </div>

            </div>
        </form>

    </div>
</div>

<!-- Imported scripts on this page -->
<script src="{{ url('assets/js/toastr/toastr.min.js') }}"></script>
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
