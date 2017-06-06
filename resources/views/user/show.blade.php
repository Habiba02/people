@extends('layouts.app',['main_title' => 'User','second_title'=>'show','url'=>[['name'=>'home','url'=>route('home')],['name'=>'list','url'=>route('userList')],['name'=>'show','url'=>'#']]])

@section('style')
    <!-- Select2 -->
    <link href="{{ asset('/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <!-- upload widget -->
    <div class="box box-info">
        <div class="box-header">
            <i class="fa fa-user"></i>
            <h3 class="box-title">User</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div>
        <div class="box-body">
            <p>{!! $user->name !!}</p>
        </div>
        <div class="box-footer">
        </div>
    </div>
@stop

@section('script')
    <!-- Select2 -->
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}" type="text/javascript"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
        });
    </script>
@stop