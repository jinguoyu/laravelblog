<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>文章列表</title>
    <link href="{{asset('resources/views/admin/style/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/views/admin/style/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/views/admin/style/css/custom-styles.css')}}" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="{{asset('resources/views/admin/style/js/jquery-1.10.2.js')}}"></script>
    <script src="{{asset('resources/org/layer/layer.js')}}"></script>
    <style>
        .navbar-right {
            margin-right: 0;
        }

        footer {
            height: 80px;
            text-align: center;
            background-color: #333;
            color: #fff;
        }

        #wrapper {
            overflow: hidden;
            margin-bottom: 50px;
        }

        #page-inner {
            margin-bottom: 60px;
        }

        .table-striped {
            text-align: center;
        }

        .tc input {
            width: 25px;
            text-align: center;
        }

        table th {
            text-align: center
        }
    </style>
</head>

<body>
    @extends('layouts.admin') 
    @section('navigation')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{url('admin\index')}}">首页</a>
                        </li>
                        <li><a href="{{url('admin\article')}}">文章管理</a>
                        </li>
                        <li class="active">文章列表</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-12" style="padding-left:0;padding-right:0;">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width:60px;">排序</th>
                                        <th style="width:40px">ID</th>
                                        <th>文章标题</th>
                                        <th style="width:80px">查看次数</th>
                                        <th style="width:200px">操作</th>
                                    </tr>
                                </thead>
                                <tbody>@foreach($data as $v)
                                    <tr>
                                        <td class="tc">
                                            <input type="text" name="order" value="{{$v['art_order']}}" onchange="orderchang(this,{{$v['art_id']}})">
                                        </td>
                                        <td>{{$v['art_id']}}</td>
                                        <td style="text-align:left">{{$v['art_title']}}</td>
                                        <td>{{$v['art_view']}}</td>
                                        <td> <a href="{{url('admin/category/'.$v['art_id'].'/edit')}}">修改</a>
                                            <a href="javascript:;" onclick="delcate({{$v['art_id']}},'{{$v['art_name']}}')">删除</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function orderchang(obj, id) {
            var num = $(obj).val();
            $.ajax({
                type: "post",
                url: "{{url('admin/category/orderchang')}}",
                data: {
                    'catid': id,
                    'order': num,
                    '_token': '{{csrf_token()}}'
                },
                success: function(data) {
                    if (data > 0) {
                        alert('更改排序成功！');
                    } else {
                        alert('更改排序失败！');
                    }
                }
            });
        }
         //确认是否删除分类
        function delcate(id, name) {
            layer.confirm('你确定要删除' + name + '分类吗？', {
                btn: ['确定', '取消'] //按钮
            }, function() {
                $.ajax({
                    type: "post",
                    url: "{{url('admin/category/')}}/" + id,
                    data: {
                        '_token': '{{csrf_token()}}',
                        '_method': 'delete'
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            layer.msg(data.msg, {
                                icon: 6
                            });
                            location.href = location.href;
                        } else if (data.status == 3) {
                            layer.msg(data.msg, {
                                icon: 5
                            });
                        } else {
                            layer.msg(data.msg, {
                                icon: 5
                            });
                        }
                    },
                    error: function() {
                        layer.msg('删除出错，请重试！', {
                            icon: 5
                        });
                    }
                });
            }, function() {});
        }
    </script>@endsection