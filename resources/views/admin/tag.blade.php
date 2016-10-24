<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/10 0010
 * Time: 10:53
 */?>
@extends('layouts.admin')
@section('css')

@endsection

@section('content')
        <!-- Removing search and results count filter -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">标签列表</h3>

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

    <div class="row" style="display: none" id="success">
        <div class="col-md-12">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">关闭</span>
                </button>
                <strong>成功了！</strong>你已经成功删除标签
            </div>
        </div>
    </div>

    <div class="row" style="display: none" id="danger">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">关闭</span>
                </button>
                <strong>失败了！</strong>删除标签失败
            </div>
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
                        null
                    ],
                });
            });
        </script>

        <table class="table table-bordered table-striped" id="example-2">
            <input value="" id="tagid" hidden>
            <thead>
            <tr>
                <th>标签名</th>
                <th>别名</th>
                <th>文章数</th>
                <th>操作</th>
            </tr>
            </thead>

            <tbody class="middle-align">
            @foreach($tagList as $tag)
                <tr id="tr_{{ $tag->id }}" >
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->alias  }}</td>
                    @if($tag->number == null)
                        <td>0</td>
                    @else
                        <td>{{ $tag->number }}</td>
                    @endif
                    <td>
                        <a href="{{ url('admin/tagedit') }}/{{ $tag->id }}" class="btn btn-secondary btn-sm btn-icon icon-left">
                            编辑
                        </a>

                        <a href="javascript:;" onclick="getId({{ $tag->id }})" class="btn btn-danger btn-sm btn-icon icon-left" >
                            删除
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <button onclick="location.href='{{ url('admin/tagadd') }}'" class="btn btn-info btn-single pull-right">添加标签</button>
    </div>
</div>


@endsection
@section('js')
    {{--弹出框--}}
    <div class="modal fade" id="modal-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">删除确认</h4>
                </div>

                <div class="modal-body">
                    你确定删除吗？
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" id="modal_hide" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-info" onclick="deletetag()">确定</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function getId(id){
            $('#tagid').val(id);
            jQuery('#modal-1').modal('show', {backdrop: 'fade'});
        }
        function deletetag(){
            id = $('#tagid').val();
            $.get("{{ url('admin/tagdelete') }}",
                    {
                        id:id,
                    },
                    function(data){
                        if(data){
                            $('#modal_hide').click();
                            $('#tr_'+id).remove();
                            $("#success").show();
                        }else{
                            $('#modal_hide').click();
                            $("#danger").show();
                        }

                    });
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
