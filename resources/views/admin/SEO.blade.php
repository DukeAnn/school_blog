<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/5/5 0005
 * Time: 22:01
 */?>
@extends('layouts.admin')
@section('css')

@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">SEO设置</h3>

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
            <script type="text/javascript">
                jQuery(document).ready(function($)
                {
                    $("#example-2").dataTable({
                        dom: "t" + "<'row'<'col-xs-6'i><'col-xs-6'p>>",
                        aoColumns: [
                            {bSortable: false},
                            null,
                            null,
                            null,
                            null
                        ],
                    });
                });
            </script>

            <table class="table table-bordered table-striped" id="example-2">
                <input value="" id="cateid" hidden>
                <thead>
                <tr>

                    <th>位置</th>
                    <th>标题</th>
                    <th>关键词</th>
                    <th>描述</th>
                    <th>操作</th>
                </tr>
                </thead>

                <tbody class="middle-align">
                @foreach($seo_list as $seo)
                    <tr id="tr_{{ $seo->id }}" >
                        <td id="name_{{ $seo->id }}">{{ $seo->name }}</td>
                        <td id="title_{{ $seo->id }}">{{ $seo->title  }}</td>
                        <td id="keyword_{{ $seo->id }}">{{ $seo->keyword  }}</td>
                        <td id="describe_{{ $seo->id }}">{{ $seo->describe }}</td>
                        <td>
                            <a href="javascript:;" onclick="getInfo({{ $seo->id }})" class="btn btn-secondary btn-sm btn-icon icon-left">
                                编辑
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
@section('js')
    {{--弹出框--}}
    {{--编辑--}}
        <!-- Modal 6 (Long Modal)-->
    <div class="modal fade" id="modal-6">
        <div class="modal-dialog">
            <form method="post" action="{{ url('admin/seo/save') }}">
                {!! csrf_field() !!}

                <input type="text" class="form-control" name="id" id="seo_id" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">编辑SEO</h4>
                    </div>

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-1" class="control-label">标题</label>

                                    <input type="text" class="form-control" name="title" id="seo_title" placeholder="title">
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-2" class="control-label">关键词</label>

                                    <input type="text" class="form-control" name="keyword" id="seo_keyword" placeholder="（用英文呢逗号隔开）">
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group no-margin">
                                    <label for="field-7" class="control-label">描述</label>
                                    <textarea class="form-control autogrow" name="describe" id="seo_describe" placeholder="网页描述"></textarea>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-info">保存</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
    <script type="text/javascript">
        function getInfo(id){
            $('#seo_id').val(id);
            var title = $('#title_'+id).text();
            var keyword = $('#keyword_'+id).text();
            var describe = $('#describe_'+id).text();
            $('#seo_title').val(title);
            $('#seo_keyword').val(keyword);
            $('#seo_describe').val(describe);
            jQuery('#modal-6').modal('show', {backdrop: 'static'});
        }
    </script>

    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="{{ asset('assets/js/datatables/dataTables.bootstrap.css') }}">
    <script src="{{ asset('assets/js/datatables/js/jquery.dataTables.min.js') }}"></script>
    <!-- Imported scripts on this page -->
    <script src="{{ asset('assets/js/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/yadcf/jquery.dataTables.yadcf.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/tabletools/dataTables.tableTools.min.js') }}"></script>

@endsection

