<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>修改分类</title>
    <link href="{{asset('resources/views/admin/style/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/views/admin/style/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/views/admin/style/css/custom-styles.css')}}" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="{{asset('resources/views/admin/style/js/jquery-1.10.2.js')}}"></script>
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
    width: 85%;
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
                        <li><a href="{{url('admin\category')}}">分类管理</a>
                        </li>
                        <li class="active">修改分类</li>
                    </ol>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8" style="text-align:center">
                            <form role="form" action="{{url('admin/category/'.$result->cat_id)}}" method="post">
                                <input type="hidden" name="_method" value="put">{{csrf_field()}}
                                <div class="form-group">
                                    <label class="control-label">分类名称</label>
                                    <input type="text" class="form-control" name="cat_name" value="{{$result->cat_name}}">
                                </div>
                                <div class="form-group ">
                                    <label>上级分类</label>
                                    <select class="form-control" name="cat_pid">
                                        <option value="0">顶级分类</option>@foreach($data as $v) @if($v[cat_id]==$catpid)
                                        <option value="{{$v['cat_id']}}" selected="selected">{{$v['cat_name']}}</option>@else
                                        <option value="{{$v['cat_id']}}">{{$v['cat_name']}}</option>@endif @endforeach</select>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">关&nbsp;&nbsp;键&nbsp;&nbsp;词</label>
                                    <input type="text" class="form-control" name="cat_keyword" value="{{$result->cat_keyword}}">
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">描&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;述</label>
                                    <textarea class="form-control" rows="3" name="cat_description">{{$result->cat_description}}</textarea>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">排&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;序</label>
                                    <input type="text" class="form-control" name="cat_order" value="{{$result->cat_order}}">
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