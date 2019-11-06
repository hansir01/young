<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html Public "-//W3C//DTD XHTML 1.0 Transitional//EN">
<!-- saved from url=(0036)http://www.lanmayi.cn/zkbm/list_679/ -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<style media="screen"></style>
	<title>宠之魅</title>
	<link href="/Public/images/home/shareone.jpg" rel="shortcut icon" type="image/x-icon"/>
	<meta name="description" content="体验宠物的魅力">
	<meta name="keywords" content="体验宠物的魅力">
	<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/Public/css/admin_css.css" rel="stylesheet" type="text/css">
	<script src="/Public/js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script src="/Public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<div class="menu">
		<ol class="breadcrumb">
		  <li><a href="#">首页</a></li>
		  <li><a href="#">宠物分类</a></li>
		  <li class="active">分类添加</li>
		</ol>
	<div class="catalog">
		<div class="cataradio"><input type="radio" checked="checked" name="catalog" value="fircatalog" />一级分类操作</div>
		<div class="cataradio"><input type="radio" name="catalog" value="seccatalog" />二级分类操作</div>
	</div>
	<div class="concatalog" id="fircatalog">
		<form action="#" method="post">
			<div class="catainput">一级分类：
				<input type="text" name="fircatalog"/>
			</div>
			<div class="catasub">
				<input type="submit" name="submit" value="提交"/>
				<input type="reset" name="reset" value="重置"/>
			</div>
			<input type="hidden" name="tag" value="0"/>
		</form>
	</div>
	<div class="concatalog" id="seccatalog" style="display:none">
		<form action="#" method="post">
			<div class ="catainput">一级分类：
				<select name="fircid">
					<option value="1">一级分类</option>
					<option value="1">一级分类</option>
					<option value="1">一级分类</option>
				</select>
			</div>
			<div class ="catainput">二级分类：
				<input type="text" name="seccatalog"/>
			</div>
			<div class ="catainput">分类路径：
				<input type="text" name="securl"/>
			</div>
			<div class="catasub">
				<input type="submit" name="submit" value="提交"/>
				<input type="reset" name="reset" value="重置"/>
			</div>
			<input type="hidden" name="tag" value="1"/>
		</form>
	</div>
</div>
</body>
<script type="text/javascript">
$(function(){
	$('.cataradio input:radio').change(function(){
		if($('.cataradio input:checked').val() =="seccatalog"){
			$('#fircatalog').hide();
			$('#seccatalog').show();
		}else{
			$('#fircatalog').show();
			$('#seccatalog').hide();
		}
	})
})
</script>
</html>