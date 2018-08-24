<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>添加文章</title>
    <link href="{{asset('resources/views/admin/style/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/views/admin/style/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/views/admin/style/css/custom-styles.css')}}" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="{{asset('resources/views/admin/style/js/jquery-1.10.2.js')}}"></script>


<script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"> </script>
<script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>

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

        @media(max-width:768px) {
            .sidebar-collapse {
            display: none;
            }
        }

    .form-control {
        width:85%;
        display: initial;
    }

    .pass-mar {
        margin-left: 10px;
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
                        <li class="active">添加文章</li>
                    </ol>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12" style="text-align:left;margin-left:10px">
                        @if(count($errors)>0)
                            <div class="alert alert-warning" style="text-align:left">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                            </div>
                        @endif 
                        @if(session('msg'))
                            <div class="alert alert-warning" style="text-align:left">
                                <li>{{session('msg')}}</li>
                            </div>
                        @endif
                            <form role="form" action="{{url('admin/article')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label class="control-label" >文章标题</label>
                                    <input type="text" class="form-control" name="art_title"  style="width:50%"><i class="text-muted">*</i>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >文章作者</label>
                                    <input type="text" class="form-control" name="art_author" style="width:30%">
                                </div>
                                <div class="form-group ">
                                    <label >文章分类</label>
                                    <select  class="form-control" name="art_catid" style="width:40%">
                               
                                    @foreach($data as $v)
                                        <option value ="{{$v['cat_id']}}">{{$v['cat_name']}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">缩&nbsp;&nbsp;略&nbsp;&nbsp;图</label>
                                
                                    <input type="file" class="form-control" name="art_thumb" style="width:50%"> 
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">关&nbsp;&nbsp;键&nbsp;&nbsp;词</label>
                                    <input type="text" class="form-control" name="art_key" style="width:50%"> 
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">文章简介</label>
                                    <textarea class="form-control" rows="3" name="art_description"  style="width:75%"></textarea> 
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">文章内容</label>
                            <script id="editor" type="text/plain" name="art_content" style="width:90%;height:500px;"></script>
 
                                </div>
                                <button type="submit" class="btn btn-default">提交</button>
                                <button type="reset" class="btn btn-default">重置</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection


<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


   
</script>

