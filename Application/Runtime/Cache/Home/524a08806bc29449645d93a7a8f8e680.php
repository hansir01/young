<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html Public "-//W3C//DTD XHTML 1.0 Transitional//EN">
<!-- saved from url=(0036)http://www.lanmayi.cn/zkbm/list_679/ -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<style media="screen"></style>
	<title><?php echo (L("title")); ?></title>
	<link href="/Public/images/home/shareone.jpg" rel="shortcut icon" type="image/x-icon"/>
	<meta name="description" content="体验宠物的魅力">
	<meta name="keywords" content="体验宠物的魅力">
	<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/Public/css/login.css" rel="stylesheet" type="text/css">
	<script src="/Public/js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script src="/Public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<div class="r_pet_login">
	<div class="pet_name"><a href="/">Pet Charm—宠之魅</a></div>
	<div class="login">	
		<form action="" method="post" id="form">
			<div class="login_div"><div class="tit">用户名</div>：<input type="text" name="username" id="username" /></div>
			<div class="login_div"><div class="tit">密码</div>：<input type="password" name="password" id="password" /></div>
			<div class="login_div"><div class="tit">确认密码</div>：<input type="password" name="repass" id="repass"/></div> 
			<div class="subinsert"><input type="submit" name="submit" value="注册" /> <a href="/index.php/home/login">登录</a> <input type="reset" name="reset" value="重置" /></div>
		</form>
	</div>
</div>
</body>
<script>
$(function(){
	$("#username").blur(function(){
		var user = $("#username").val();
		if(user == '')
		{
			$("#notice1").remove();
			$("#username").after('<span class="notice" id="notice1" >不能为空</span>');
		}else
		{
			$("#notice1").remove();
		}
	})
	$("#password").blur(function(){
		var password = $("#password").val();
		if(password == '')
		{
			$("#notice2").remove();
			$("#password").after('<span class="notice" id="notice2" >不能为空</span>');
		}else
		{
			if(password.length < 6)
			{
				$("#notice2").remove();
				$("#password").after('<span class="notice" id="notice2" >输入6位以上</span>');
			}else
			{
				$("#notice2").remove();
			}

		}
	})
	$("#repass").blur(function(){
		var password = $("#password").val();
		var repass = $("#repass").val();
		if(repass == '')
		{
			$("#notice3").remove();
			$("#repass").after('<span class="notice" id="notice3" >不能为空</span>');
			
		}else
		{
			if(repass != password)
			{
				$("#notice3").remove();
				$("#repass").after('<span class="notice"id="notice3" >两次密码不一致</span>');
			}else
			{
				$("#notice3").remove();
			}
		}
		
	})

	$("form").submit(function(){
		var user = $("#username").val();
		var repass = $("#repass").val();
		var password = $("#password").val();
		if(user == '')
		{
			return false;
		}
		if(password == '')
		{
			return false;
		}else
		{
			if(password.length < 6)
			{
				return false;
			}
		}
		if(repass == '')
		{
			return false;
		}else
		{
			if(repass != password)
			{
				return false;
			}
		}
		
	});
})
</script>
</html>