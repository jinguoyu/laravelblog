<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>后台登录</title>
  <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/amazeui.min.css')}}">
  <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/app.css')}}">
</head>
<body>
<div class="am-g myapp-login" style="height: 100vh">
	<div class="myapp-login-bg">
	<div data-am-widget="tabs" class="am-tabs am-tabs-d2">
	    <div class="am-tabs-bd">
	        <div data-tab-panel-0 class="am-tab-panel am-active">
				@if(session('msg'))
	        	<p style='color:red;width:100%;text-align:center'>{{session('msg')}}</p>
	        	@endif	  
				<form action="" class="am-form" method="post">
				{{ csrf_field() }}
					<fieldset>
						<div class="am-form-group">
							<label for="doc-vld-name">账号</label>
							<input type="text" id="doc-vld-name" minlength="3"  class="am-form-field" name='name'/>
						</div>
						<div class="am-form-group">
							<label for="doc-vld-name">密码</label>
							<input type="password" id="doc-vld-name2" minlength="3"  class="am-form-field" name='password'/>
						</div>
						<label for="doc-vld-name">验证码</label>
						<div class="am-form-group">
							<input type="text" id="doc-vld-name3" minlength="3"  class="am-form-field" name='code' style="width:50%;float:left"/>
							<img src="{{url('admin/code')}}" id="doc-vld-name4" style="margin-left:20px;margin-top:5px" onClick="this.src='{{url('admin/code')}}?'+Math.random()">
						</div>
						<button class="myapp-login-button am-btn am-btn-secondary" type="submit">登录</button>
					</fieldset>
				</form>
	          </div>
	      </div>
	  </div>
	</div>
</div>
</body>
</html>