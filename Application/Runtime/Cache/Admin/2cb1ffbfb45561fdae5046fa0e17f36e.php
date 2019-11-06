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
<style type="text/css">
	*{
		margin:0px ;
		padding:0px;
	}
	body{
		border:0px; margin:0px; padding:0px;background:url(/Public/images/admin/sky1.jpg);
	}
	.companyname{
		font-size:30px;
		font-weight: bold;
		margin-left:40px;
		margin-top: 6px;
		float:left;
		color: #00FFCC;
	}
	#top1{
		height:80px;
	}
	#setMenu{
		width:700px;
		height:42px;
		margin-top:40px;
		margin-left:300px;
		background: #BE7AEB;
		font-size: 16px;
		font-weight: bold;
	}
	.logout {
		margin-right: 150px;
		text-align:right;
		font-weight: bold;
		margin-top: 3px;
		font-size: 13px;
		color: #BE7AEB;
	}
	.logout a{
		text-decoration:none;
		color: #A6E22E;
	}
</style>
<script src="/Public/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$(".exit").click(function(){
		$.ajax({
			dataType:'json', 
			type:'POST',
			url:'/admin.php/index/logout',
			cache:false,
			success:function(data)
			{
				if(data.status == 1){
					window.location.href=parent.location.reload();
				}else{
					alert("退出失败！");
				}
			}
		})
	})
})
</script>
<body>
<div class="companyname">Pet Charm—宠之魅</div>
<div class="logout">
	<span><?php echo ($admin); ?>，欢迎登录后台!</span>&nbsp;
	<a class="exit" href="javascript:;">[退出]</a>
</div>
<div id="top1">
	<div id="setMenu">
		<ul class="nav nav-pills">
			<?php if(is_array($menu)): foreach($menu as $key=>$v): ?><li><a href="<?php echo ($v["url"]); ?>?id=<?php echo ($v["id"]); ?>" target="menuFrame"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; ?>
		</ul>
	</div>
</div>
</body>
</html>