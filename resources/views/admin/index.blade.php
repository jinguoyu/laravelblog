<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>后台首页</title>
    <link href="{{asset('resources/views/admin/style/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/views/admin/style/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/views/admin/style/css/custom-styles.css')}}" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<script src="{{asset('resources/views/admin/style/js/jquery-1.10.2.js')}}"></script>
<style>

.navbar-right {
    margin-right: 0;
}
footer{
    height:80px;
    text-align: center;
    background-color: #333;
    color:#fff;
}
#wrapper{
    overflow: hidden
}
#page-inner{
    margin-bottom:60px;
}
 @media(max-width:768px) {
.sidebar-collapse{
    display:none;
}
}
.form-control{
    width:50%;
    display: initial;
}
.pass-mar{
    margin-left:10px;
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
                            <li><a href="#">首页</a>
                            </li>
                            <li class="active">基本统计</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green green">
                            <div class="panel-left pull-left green"> <i class="fa fa-eye fa-5x"></i>
                            </div>
                            <div class="panel-right">
                                <h3>8,457</h3>
                                <strong>访问量</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-left pull-left red"> <i class="fa fa fa-comments fa-5x"></i>
                            </div>
                            <div class="panel-right">
                                <h3>{{$news}}</h3>
                                <strong>文章总数</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-left pull-left blue"> <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="panel-right">
                                <h3>52,160 </h3>
                                <strong>留言数</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-left pull-left brown"> <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="panel-right">
                                <h3>36,752 </h3>
                                <strong>评论数</strong>
                            </div>
                        </div>
                    </div>
                </div>

 
            </div>
        </div>

    </div>
@endsection