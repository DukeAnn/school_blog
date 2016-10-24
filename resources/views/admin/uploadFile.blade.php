<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/19 0019
 * Time: 18:33
 */?>
@extends('layouts.admin')

@section('content')
    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="panel-title">
                Basic Initialization
            </div>
        </div>

        <div class="panel-body">

            <!-- Auto initialization -->
            <form action="{{ url('admin/uploadFile') }}" class="dropzone"></form>

        </div>
    </div>
@endsection

@section('js')
<!-- Imported styles on this page -->
<link rel="stylesheet" href="{{ asset('assets/js/dropzone/css/dropzone.css') }}">
<script src="{{ asset('assets/js/dropzone/dropzone.min.js') }}"></script>
@endsection