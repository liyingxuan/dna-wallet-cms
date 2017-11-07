<?php
/**
 * Created by PhpStorm.
 * User: lyx
 * Date: 16/3/23
 * Time: 上午11:30
 */
?>

@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-1">
            <a href="{{URL::to('intelligence/create')}}" class="btn btn-success">新建情报</a>
        </div>
    </div>
    <div class="row" style="margin-top: 25px">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$page_title or "数据列表"}}</h3>
                    <div class="box-tools pull-right">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="快速查询">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default disabled">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>序号</th>
                            <th>标题</th>
                            <th>摘要</th>
                            {{--<th>头图</th>--}}
                            {{--<th>内容</th>--}}
                            <th>作者-修改者</th>
                            <th>管理操作</th>
                        </tr>
                        @forelse($data as $item)
                            <tr>
                                <td class="col-md-1">{{$item->id}}</td>
                                <td class="col-md-2">{{$item->title}}</td>
                                <td class="col-md-7">{{$item->summary}}</td>
                                {{--<td><img src="{{$item->focus_img_url}}" style="width: 150px;"></td>--}}
                                {{--<td class="col-md-2">{{$item->content}}</td>--}}
                                <td class="col-md-1">
                                    <strong>{{$item->author}}</strong>
                                    @if($item->editor != '')
                                        - {{$item->editor}}
                                    @endif
                                </td>
                                <td class="col-md-1">
                                    <a class="btn btn-info" href="{{URL::to('intelligence/'.$item->id.'/edit')}}">
                                        编辑
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">暂无数据</td>
                            </tr>
                        @endforelse
                    </table>
                </div>

                @if($data->render() !== "")
                    <div class="box-footer">
                        {!! $data->render() !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript">
        $('#defalutModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var url = button.data('url');
            var modal = $(this);

            modal.find('form').attr('action', url);
        })
    </script>
@stop
