<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html Public "-//W3C//DTD XHTML 1.0 Transitional//EN">
<!-- saved from url=(0036)http://www.lanmayi.cn/zkbm/list_679/ -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<style media="screen"></style>
	<title>宠之魅后台</title>
	<link href="/Public/images/home/shareone.jpg" rel="shortcut icon" type="image/x-icon"/>
	<meta name="description" content="体验宠物的魅力">
	<meta name="keywords" content="体验宠物的魅力">
	<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/Public/css/login.css" rel="stylesheet" type="text/css">
	<script src="/Public/js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script src="/Public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<div class="pet_login">
	<div class="pet_name"><a href="/admin.php">宠之魅系统后台</a></div>
	<div class="login">	
		<form action="/admin.php/index/login" method="post" >
			<div class="login_div"><div class="tit">用户名</div>：<input type="text" name="adminname" /></div>
			<div class="login_div"><div class="tit">密码</div>：<input type="password" name="password" /></div>
			<div class="subinsert"><input type="submit" name="submit" value="登录" /> <a href="/index.php">首页</a> <input type="reset" name="reset" value="重置" /></div>
			
		</form>
	</div>
</div>
</body>
</html>