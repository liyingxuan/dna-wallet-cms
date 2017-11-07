<?php
/**
 * Created by PhpStorm.
 * User: lyx
 * Date: 16/3/30
 * Time: 下午3:32
 */
?>

@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <form class="form-horizontal" action="{{URL::to('intelligence/'.$data->id)}}" method="post" enctype="multipart/form-data">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$page_title or "page_title"}}</h3>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="put">
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-1 control-label">标题</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="title" placeholder="标题" value="{{$data->title}}">
                                @include('layouts.message.tips',['field'=>'title'])
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="summary" class="col-sm-1 control-label">摘要</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="summary" rows="3">{{$data->summary}}</textarea>
                                @include('layouts.message.tips',['field'=>'summary'])
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label for="focus_img_url" class="col-sm-1 control-label">展示图</label>--}}
                            {{--<div class="col-sm-8">--}}
                                {{--<input type="text" style="display:none" class="form-control" id="focus_img_url" name="focus_img_url" placeholder="展示图" value="{{$data->focus_img_url}}">--}}
                                {{--@include('layouts.message.tips',['field'=>'focus_img_url'])--}}

                                {{--<div id="focus_img">--}}
                                    {{--<img src="{{$data->focus_img_url}}" alt="image without thumbnail corners" style="width: 350px;">--}}
                                    {{--<div id="image-holder"></div>--}}
                                {{--</div>--}}
                                {{--<div class="btn btn-default btn-file">--}}
                                    {{--<i class="fa fa-paperclip" id="upload_focus_img_icon">上传新的展示图</i>--}}
                                    {{--<input name="upload_focus_img" id="upload_focus_img" type="file" />--}}
                                {{--</div>--}}
                                {{--<p class="help-block">需要长750 * 520大小的图片</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label for="content" class="col-sm-1 control-label">内容</label>
                            <div class="col-sm-11">
                                <div id="container" name="content" class="edui-default"></div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-8">
                            <a class="btn btn-default" href="{{route('intelligence.index')}}">返 回</a>
                            <button type="submit" class="btn btn-success pull-right">提 交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('script')
    <!-- 加载编辑器的容器 -->
    @include('UEditor::head')
    <script type="text/javascript">
        var ue = UE.getEditor('container', {
            initialFrameWidth : 960,
            initialFrameHeight : 450
        });
        ue.ready(function(){
            //因为Laravel有防csrf防伪造攻击的处理所以加上此行
            ue.execCommand('serverparam','_token','{{ csrf_token() }}');
        });
        ue.addListener("ready", function () {
            ue.setContent('{!! $data->content !!}', false);
        });
    </script>

    <script>
        $("#upload_focus_img").on('change', function () {
            $("#upload_focus_img_icon").text($("#upload_focus_img").val()) ;
            $("#focus_img").hide();
        });
    </script>
@stop