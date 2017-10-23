<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"C:\wamp\www\TPC\tp5a\public/../application/reslog\view\register\register.html";i:1508764895;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>注册</title>
<link href="__CSS__/bootstrap.min.css" rel="stylesheet">
<link href="__CSS__/gloab.css" rel="stylesheet">
<link href="__CSS__/resfir.css" rel="stylesheet">
<script src="__JS__/jquery-1.11.1.min.js"></script>
<script src="__JS__/register.js"></script>
</head>
<body class="bgf4">

 <form action="<?php echo url('reslog/register/register'); ?>" method="post">
    <div class="login-box f-mt10 f-pb50">
    	<div class="main bgf">    
        	<div class="reg-box-pan display-inline">  
            	<div class="step">        	
                    <ul>
                        <li class="col-xs-4 on">
                            <span class="num"><em class="f-r5"></em><i>1</i></span>                	
                            <span class="line_bg lbg-r"></span>
                            <p class="lbg-txt">填写账户信息</p>
                        </li>
                        <li class="col-xs-4">
                            <span class="num"><em class="f-r5"></em><i>2</i></span>
                            <span class="line_bg lbg-l"></span>
                            <span class="line_bg lbg-r"></span>
                            <p class="lbg-txt">验证账户信息</p>
                        </li>
                        <li class="col-xs-4">
                            <span class="num"><em class="f-r5"></em><i>3</i></span>
                            <span class="line_bg lbg-l"></span>
                            <p class="lbg-txt">注册成功</p>
                        </li>
                    </ul>
                </div>
            	<div class="reg-box" id="verifyCheck" style="margin-top:20px;">
                	<div class="part1">                	
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl"><b class="ftx04">*</b>用户名：</span>    
                            <div class="f-fl item-ifo">
                                <input name="name" type="text" maxlength="20" class="txt03 f-r3 required" tabindex="1" data-valid="isNonEmpty||between:3-20
                                ||isUname" data-error="用户名不能为空||用户名长度3-20位||只能输入中文、字母、数字、下划线，且以中文或字母开头||用户名已存在" id="adminNo" />                            <span class="ie8 icon-close close hide"></span>
                                <label class="icon-sucessfill blank hide"></label>
                                <label class="focus"><span>3-20位，中文、字母、数字、下划线的组合，以中文或字母开头</span></label>
                                <label class="focus valid"></label>
                            </div>
                        </div>
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl"><b class="ftx04">*</b>手机号：</span>    
                            <div class="f-fl item-ifo">
                                <input name="phone" type="text" class="txt03 f-r3 required" keycodes="tel" tabindex="2" data-valid="isNonEmpty||isPhone" data-error="手机号码不能为空||手机号码格式不正确" maxlength="11" id="phone" /> 
                                <span class="ie8 icon-close close hide"></span>                           
                                <label class="icon-sucessfill blank hide"></label>
                                <label class="focus">请填写11位有效的手机号码</label>
                                <label class="focus valid"></label>
                            </div>
                        </div>
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl"><b class="ftx04">*</b>密码：</span>    
                            <div class="f-fl item-ifo">
                                <input name="password" type="password" id="password" maxlength="20" class="txt03 f-r3 required" tabindex="3" style="ime-mode:disabled;" onpaste="return  false" autocomplete="off" data-valid="isNonEmpty||between:6-20||level:2" data-error="密码不能为空||密码长度6-20位||该密码太简单，有被盗风险，建议字母+数字的组合" /> 
                                <span class="ie8 icon-close close hide" style="right:55px"></span>
                                <span class="showpwd" data-eye="password"></span>                        
                                <label class="icon-sucessfill blank hide"></label>
                                <label class="focus">6-20位英文（区分大小写）、数字、字符的组合</label>
                                <label class="focus valid"></label>
                                <span class="clearfix"></span>
                                <label class="strength">
                                	<span class="f-fl f-size12">安全程度：</span>
                                	<b><i>弱</i><i>中</i><i>强</i></b>
                                </label>    
                            </div>
                        </div>
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl"><b class="ftx04">*</b>确认密码：</span>    
                            <div class="f-fl item-ifo">
                                <input name="repassword" type="password" maxlength="20" class="txt03 f-r3 required" tabindex="4" style="ime-mode:disabled;" onpaste="return  false" autocomplete="off" data-valid="isNonEmpty||between:6-16||isRepeat:password" data-error="密码不能为空||密码长度6-16位||两次密码输入不一致" id="rePassword" />
                                <span class="ie8 icon-close close hide" style="right:55px"></span>
                                <span class="showpwd" data-eye="rePassword"></span>
                                <label class="icon-sucessfill blank hide"></label>
                                <label class="focus">请再输入一遍上面的密码</label> 
                                <label class="focus valid"></label>                          
                            </div>
                        </div>
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl"><b class="ftx04">*</b>验证码：</span>    
                            <div class="f-fl item-ifo">
                                <input name="yzm" type="text" maxlength="4" class="txt03 f-r3 f-fl required" tabindex="4" style="width:167px" id="randCode" data-valid="isNonEmpty" data-error="验证码不能为空" /> 
                                <span class="ie8 icon-close close hide"></span>
                                <label class="f-size12 c-999 f-fl f-pl10">
                                	<div><img src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src=this.src"/></div>                               
                                </label>                        
                                <label class="icon-sucessfill blank hide" style="left:380px"></label>
                                <label class="focusa">点击图片可刷新</label>   
                                <label class="focus valid" style="left:370px"></label>                        
                            </div>
                        </div>
                        <div class="item col-xs-12" style="height:auto">
                            <span class="intelligent-label f-fl">&nbsp;</span>  
                            <p class="f-size14 required"  data-valid="isChecked" data-error="请先同意条款"> 
                            	<input type="checkbox" checked /><a href="javascript:showoutc();" class="f-ml5">我已阅读并同意条款</a>
                            </p>                       
                            <label class="focus valid"></label> 
                        </div> 
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl">&nbsp;</span>    
                            <div class="f-fl item-ifo">
                               <a href="javascript:;" class="btn btn-blue f-r3" id="btn_part1">下一步</a>                         
                            </div>
                        </div> 
                    </div>
                    <div class="part2" style="display:none">
                    	<div class="alert alert-info" style="width:700px">请点击发送验证码,然后输入手机接收到的验证码</div>                    
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl"><b class="ftx04">*</b>验证码：</span>    
                            <div class="f-fl item-ifo">
                                <input name="sjyzm" type="text" maxlength="6" id="verifyNo" class="txt03 f-r3 f-fl required" tabindex="4" style="width:167px" data-valid="isNonEmpty||isInt" data-error="验证码不能为空||请输入6位数字验证码" /> 
                               	<span class="btn btn-gray f-r3 f-ml5 f-size13" id="time_box" disabled style="width:97px;display:none;">发送验证码</span>
                                <span class="btn btn-gray f-r3 f-ml5 f-size13" id="verifyYz" style="width:97px;">发送验证码</span>
                                <span class="ie8 icon-close close hide" style="right:130px"></span>
                                <label class="icon-sucessfill blank hide"></label>
                                <label class="focus"><span>请查收手机短信，并填写短信中的验证码（此验证码3分钟内有效）</span></label>   
                                <label class="focus valid"></label>                        
                            </div>
                        </div>
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl">&nbsp;</span>    
                            <div class="f-fl item-ifo">
                               <a href="javascript:;" class="btn btn-blue f-r3" id="btn_part2">下一步</a>                         
                            </div>
                        </div> 
                    </div>
                    <div class="part3" style="display:none">
                    	<div class="item col-xs-12">
                            <span class="intelligent-label f-fl"><b class="ftx04">*</b>真实姓名：</span>    
                            <div class="f-fl item-ifo">
                                <input name="xingming" type="text" maxlength="10" class="txt03 f-r3 required" tabindex="1" data-valid="isNonEmpty||between:2-10||isZh" data-error="真实姓名不能为空||真实姓名长度2-10位||只能输入中文" id="adminNo" />   
                                <span class="ie8 icon-close close hide"></span>                         
                                <label class="icon-sucessfill blank hide"></label>
                                <label class="focus">2-10位，中文真实姓名</label>
                                <label class="focus valid"></label>
                            </div>
                        </div>
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl"><b class="ftx04">*</b>身份证号：</span>    
                            <div class="f-fl item-ifo">
                                <input name="cardid" type="text" class="txt03 f-r3 required" tabindex="2" data-valid="isNonEmpty||isCard" data-error="身份证号不能为空||身份证号码格式不正确" maxlength="18" id="phone" />    
                                <span class="ie8 icon-close close hide"></span>                        
                                <label class="icon-sucessfill blank hide"></label>
                                <label class="focus">请填写18位有效的手机号码</label>
                                <label class="focus valid"></label>
                            </div>
                        </div>
                        <div class="item col-xs-12">
                            <span class="intelligent-label f-fl">&nbsp;</span>    
                            <div class="f-fl item-ifo">
                               <a href="javascript:;" class="btn btn-blue f-r3" id="btn_part3">下一步</a>
                            </div>
                        </div>
                    </div>  
                    <div class="part4 text-center" style="display:none">
                    	<h3>请点击注册加入本站吧</h3>
                        <input type="submit" name="tijiao" value="注册" class="btn btn-blue f-r3" id="btn_part3"/>
                    </div>          
                </div>
            </div>
        </div>
    </div>
</form>

<div class="m-sPopBg" style="z-index:998;"></div>
<div class="m-sPopCon regcon">
	<div class="m-sPopTitle"><strong>服务协议条款</strong><b id="sPopClose" class="m-sPopClose" onClick="closeClause()">×</b></div>
    <div class="apply_up_content">
    	<pre class="f-r0">
		<strong>同意以下服务条款，提交注册信息</strong>
        <p>
            欢迎注册TPC网站,如果您未满18周岁
            请在法定监护人的陪同下阅读本协议
            并请特别注意阅读未成年人使用条款
        </p>
        </pre>
    </div>
    <center><a class="btn btn-blue btn-lg f-size12 b-b0 b-l0 b-t0 b-r0 f-pl50 f-pr50 f-r3" href="javascript:closeClause();">已阅读并同意此条款</a></center>
</div>
<script>
$(function(){	
	//第一页的确定按钮
	$("#btn_part1").click(function(){						
		if(!verifyCheck._click()) return;
		$(".part1").hide();
		$(".part2").show();
		$(".step li").eq(1).addClass("on");
	});
	//第二页的确定按钮
	$("#btn_part2").click(function(){			
		if(!verifyCheck._click()) return;
		$(".part2").hide();
		$(".part3").show();	
	});	
	//第三页的确定按钮
	$("#btn_part3").click(function(){			
		if(!verifyCheck._click()) return;
		$(".part3").hide();
		$(".part4").show();
		$(".step li").eq(2).addClass("on");
	});	
});
function showoutc(){$(".m-sPopBg,.m-sPopCon").show();}
function closeClause(){
	$(".m-sPopBg,.m-sPopCon").hide();		
}
</script>



<script type="text/javascript" src="__JS__/jquery-1.11.1.min.js"></script>

<script type="text/javascript">
    $("#adminNo").blur(function()
    {
        $.post($('form').attr('action'), {name:$('input[name=name]').val()}, function(data){
            var code = jQuery.parseJSON(data)['code'];
            if(code)
            {
                alert('用户名已经存在');
                $('input[name=name]').val(''); 
            }
        }, 'json');
    })
    $("#randCode").blur(function()
    {
        $.post($('form').attr('action'), {yzm:$('input[name=yzm]').val()}, function(data){
            if(1)
            {
                alert('用户名已经存在');
                $('input[name=name]').val(''); 
            }
        }, 'json');
    })
</script>
</body>
</html>
