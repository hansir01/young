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
<div class="loock_listbg">
	<div class="most">
		<div class="left" border="1" color="red">
			<img src="/Uploads<?php echo ($rs['top_url']); ?>">
			<div class="left_tit">用户名：<?php echo ($rs['username']); ?></div>
			<div class="introduce">介绍：<?php echo ($rs['say_hello']); ?></div>
			<div class="left_tit"><a href="/index.php/user/useredit">编辑资料</a></div>
		</div>
		<div class="right">
			<div class="xdaohang">
				<ul>
					<li class="on"><a href="/index.php/user">故事区</a></li>
					<li>|</li>
					<li><a href="/index.php/user/saylove">说爱区</a></li>
					<li>|</li>
					<li><a href="/index.php/user/show">宠物show</a></li>
				</ul>

			</div>
			<?php if(($sol == 0)): ?><div class="content"><div class="edittitle" >编辑资料</div>
					<div class="login_per">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="login_div">头像：<input type="file" name="picture" /></div>
						<div class="login_div">城市：
							<select name="prov" id="prov">
								<?php if(is_array($city)): foreach($city as $key=>$vo): ?><option value ="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
							</select>
						</div>
						<div class="login_div">生日：
							<select name="birthy" id="birthy">
								<?php $__FOR_START_31829__=$start;$__FOR_END_31829__=$end;for($i=$__FOR_START_31829__;$i < $__FOR_END_31829__;$i+=1){ ?><option value ="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
							</select>
							<select name="birthm" id="birthm">
								<?php $__FOR_START_1642__=1;$__FOR_END_1642__=13;for($i=$__FOR_START_1642__;$i < $__FOR_END_1642__;$i+=1){ ?><option value ="<?php echo ($i); ?>"><?php if(($i < 10)): ?>0<?php echo ($i); else: echo ($i); endif; ?></option><?php } ?>
							</select>
							<select name="birthd" id="birthd">
								<?php $__FOR_START_14171__=1;$__FOR_END_14171__=32;for($i=$__FOR_START_14171__;$i < $__FOR_END_14171__;$i+=1){ ?><option value ="<?php echo ($i); ?>"><?php if(($i < 10)): ?>0<?php echo ($i); else: echo ($i); endif; ?></option><?php } ?>
							</select>		
						</div>
						<div class="login_div">邮箱：<input type="text" name="email" value="<?php echo ($rs['email']); ?>"/></div>
						<div class="login_div">介绍：</br><textarea rows="3" cols="40" name="say_hello"><?php echo ($rs['say_hello']); ?></textarea></div>
						<div class="subinsert"><input type="submit" name="submit" value="提交" /> <input type="reset" name="reset" value="重置" /></div>
					</form>
				</div>
				</div>
			<?php else: ?>	
				<?php if(($sol == 1)): ?><div class="content">
				<?php if(is_array($story_data)): foreach($story_data as $key=>$vo): ?><div class="detail"><?php echo ($vo["info"]); ?></div><?php endforeach; endif; ?>
				</div>
				<?php elseif(($sol == 2)): ?>
				<div class="content">
				<?php if(is_array($love_data)): foreach($love_data as $key=>$vo): ?><div class="detail"><?php echo ($vo["info"]); ?></div><?php endforeach; endif; ?>
				</div>
				<?php elseif(($sol == 3)): ?>
				<div class="content">
				<?php if(is_array($show_data)): foreach($show_data as $key=>$vo): ?><div class="detail"><?php echo ($vo["title"]); ?></div><?php endforeach; endif; endif; ?>
				</div>
				<div class="user_page">
					<div class="pagingpul_right">
						<?php if(($totalPage > 1)): echo ($pageHtml); endif; ?>
					</div>
				</div><?php endif; ?>
		</div>
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
<script>
$(function(){
	$('#prov').change(function(){
		var prov = $('#prov').val();
		$.ajax({
			dataType:'json', 
			type:'POST',
			url:'/index.php/ajax/getCity',
			data:{'prov':prov},
			cache:false,
			success:function(data)
			{
				$("#city").remove();
				if(data.status == 1)
				{
					str = '<select name="city" id="city">'
					$.each(data.city,function(i,city){
						str += '<option value ="'+city.id+'">'+city.name+'</option>'
					})
					str += '</select>'
					$('#prov').after(str);
				}else
				{
					$("#city").remove();
				}
			}
		})
	})
})
</script>
</html>