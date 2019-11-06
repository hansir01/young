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
<div class="list">
	<div class="daohang">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li><a href="#">首页列表</a></li>
			<li class="active">首页列表</li>
		</ol>
	</div>
	<div class="tablelist">
		<table class="table table-striped">
			<tr>
				<td>编号</td>
				<td>标题</td>
				<td>分类</td>
				<td>内容</td>
				<td>操作</td>
			</tr>
			<?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
				<td><?php echo ($vo["id"]); ?></td>
				<td><?php echo ($vo["title"]); ?></td>
				<td><?php echo ($vo["typename"]); ?></td>
				<td><?php echo ($vo["info"]); ?></td>
				<td><a href="/admin.php/petHome/indexEdit">编辑</a>|<a href="#">删除</a></td>
			</tr><?php endforeach; endif; ?>
		</table>
	</div>
	<div class="pagelist">
		<?php echo ($pageHtml); ?>
	</div>
</div>
</body>
<script type="text/javascript">
$(function(){
	$(".pagelist ul li").mouseover(function (){
		$("li[class='active']").removeAttr("class");
		$(this).addClass("active");
	});
});
</script>
</html>