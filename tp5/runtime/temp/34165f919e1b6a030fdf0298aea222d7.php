<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"C:\wamp\www\TPC\tp5\public/../application/reslog\view\login\login.html";i:1508576677;}*/ ?>
﻿<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<!-- 1.12.4版本的 jQuery min 文件 -->
	<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="__CSS__/normalize.css" />
	<link rel="stylesheet" type="text/css" href="__CSS__/demo.css" />
	<!--必要样式-->
	<link rel="stylesheet" type="text/css" href="__CSS__/component.css" />
<!--[if IE]>
<script src="__JS__/html5.js"></script>
<![endif]-->
</head>
<body>
	<div class="container demo-1">
		<div class="content">
			<div id="large-header" class="large-header">
				<canvas id="demo-canvas"></canvas>
				<div class="logo_box">
					<h3>欢迎你</h3>
					<form action="/reslog/login/login" name="f">
						<div class="input_outer">
							<span class="u_user"></span>
							<input name="logname" id="name" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输用户名">
							<!-- <span class="margin-small"></span> -->
						</div>
						<div class="input_outer">
							<span class="us_uer"></span>
							<input name="logpass" id="password" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
							<!-- <span class="margin-small"></span> -->
						</div>
						<div class="mb2"><a id="sub" class="act-but submit" style="color: #FFFFFF">登录</a></div>
					</form>
					<div class="social-icons">
						<p>- 其他方式登录 -</p>
						<ul>
							<li class="qq">
								<a href="#"><span class="icons"></span></a>
							</li>
							<li class="weixin">
								<a href="#"><span class="icons"></span></a>
							</li>
							<div class="clear"> </div>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /container -->
	<script src="__JS__/tweenlite.min.js"></script>
	<script src="__JS__/easepack.min.js"></script>
	<script src="__JS__/raf.js"></script>
	<script src="__JS__/demo-1.js"></script>
</body>
</html>
<script type="text/javascript">
   $("#sub").click(function(){
   	var name = $.trim($("#name").val());
	var password = $.trim($("#password").val());
	if(name == ""){
		alert("请输入用户名");
		return false;
	}else if(password == ""){
		alert("请输入密码");
		return false;
	}else{
		// dump('{name:name,password:password}');
		$.post("<?php echo url('/reslog/login/login'); ?>", {name:name,password:password}, function(data){
			var code = jQuery.parseJSON(data)['code'];
			if(code){
				alert("登录成功");
				location.href ="/index/index/index";
			}
			else
			{
				alert( spinner.spinner( "value" ) );
				alert("用户名或密码不正确");
			}
		}, 'json');
	}
	// return false;
})
</script>