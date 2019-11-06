<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html Public "-//W3C//DTD XHTML 1.0 Transitional//EN">
<!-- saved from url=(0036)http://www.lanmayi.cn/zkbm/list_679/ -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<style media="screen"></style>
	<title>Pet Charm—宠之魅</title>
	<link href="/Public/images/shareone.jpg" rel="shortcut icon" type="image/x-icon"/>
	<meta name="description" content="体验宠物的魅力">
	<meta name="keywords" content="体验宠物的魅力">
	<link href="/Public/css/all_view.css" rel="stylesheet" type="text/css">
	<script src="/Public/js/jquery-1.7.2.min.js" type="text/javascript"></script>
</head>
<body>
<div class="header">
	<div class="logo">
		<?php if(($username == '')): ?><div class="login"><a href="/index.php">[首页]</a>&nbsp;|<a href="/index.php/login">[登录]</a>&nbsp;|<a href="/index.php/login/register">[注册]</a></div>
		<?php else: ?>
		<div class="login"><a href="/index.php">[首页]</a>&nbsp;|<a href="/index.php/user">[<?php echo ($username); ?>]</a>,欢迎您登录宠之魅。|<a href="/index.php/logout">[退出]</a></div><?php endif; ?>
		<h1><a href="/">Pet Charm—宠之魅</a></h1>
	</div>
</div>
<div class="daohang">
	<ul>
		<li class="on"><a href="/">首页</a></li>
		<li><a href="/index.php/story">宠物故事</a></li>
		<li><a href="/index.php/show">宠物show</a></li>
		<li><a href="/index.php/saylove">练爱区</a></li>
		<li><a href="/index.php/fight">斗宠区</a></li>
		<li><a href="/index.php/manus">投稿</a></li>
	</ul>
</div>
<div class="detail">
	<div class="title_pic"><img src="/Uploads<?php echo ($result['pic_url']); ?>"></div>
	<div class="title_info">
		<div class="title"><?php echo ($result['title']); ?></div>
		<div class="info"><?php echo ($result['info']); ?></div>
	</div>
</div>
<footer class="footer">
	<div class="ads_img"><img src="/Public/images/home/ads.jpg" alt="ads" /></div>
	<div class="about">
	<a href="/index.php/footer/about">关于我们</a>
	<a>|</a>
	<a href="/index.php/footer/contact">联系我们</a>
	<a>|</a>
	<a href="/index.php/footer/service">服务协议</a>
	<a>|</a>
	<a href="/index.php/footer/exemption">免责声明</a>
	<a>|</a>
	<a href="/index.php/footer/copyright">版权声明</a>
	<a>|</a>
	<a href="/index.php/footer/opinion">意见反馈</a>
	<a>|</a>
	<a href="/index.php/footer/help">帮助中心</a>
	</div>
	<div class="copyright">Copyright@2007-2012 petcharm.sinaapp.com All Rights Reserved. 备案号:冀ICP备09034598号</div>
	<div class="company">宠之魅网络科技有限公司&copy;</div>
</footer>
</body>
</html>