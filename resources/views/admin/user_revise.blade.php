<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>修改密码</title>
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
        width: 50%;
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
                        <li class="active">修改密码</li>
                    </ol>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6" style="text-align:center">
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
                            <form role="form" action="{{url('admin\user\post')}}" method="post">
                            {{csrf_field()}}
                                <div class="form-group has-success">
                                    <label class="control-label" for="inputSuccess">原&nbsp;密&nbsp;码:&nbsp;</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="password-o"> <span class="pass-mar">输入原始密码</span>
                                </div>
                                <div class="form-group has-warning">
                                    <label class="control-label" for="inputWarning">新&nbsp;密&nbsp;码:&nbsp;</label>
                                    <input type="password" class="form-control" id="inputWarning" name="password"> <span class="pass-mar">新密码6-20位</span>
                                </div>
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputError">确认密码:</label>
                                    <input type="password" class="form-control" id="inputError" name="password_confirmation"> <span class="pass-mar">再次输入密码</span>
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