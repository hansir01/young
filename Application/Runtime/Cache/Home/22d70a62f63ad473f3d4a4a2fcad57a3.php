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
	<div class="say">爱了就要大声说出来，不要给自己留下遗憾！未表白的，热恋中的，想追回的，请把想说的话留在这里吧！这里就是你的练爱专区! </div>
	<div id="m" class="m">
	<!-- dc 为纵向列  开始 -->
	<!----------------第一列 start-------------------->
		<div class="dc"></div>
		<div class="dc"></div>
		<div class="dc"></div>
		<div class="dc"></div>
		
	</div>
</div>
<div class="pbl_login" >
		<?php if(($totalnum > $perNum)): ?><img src="/Public/images/home/loading1.gif" alt="">
            奋力加载中......<?php endif; ?>
</div>
<div class="pagingpul" style="display: none;">
	<div class="pagingpul_right">
		<?php if(($totalPage > 1)): echo ($pageHtml); endif; ?>
	</div>
</div>
</body>
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
<script>
$(function(){
	var _height = Array(0,0,0,0);
	var stream_time = 2;
	var stream_time_max = '<?php echo ($len); ?>';//加载4次停止
	var line = $('.dc');
	var page="<?php echo ($page); ?>";
	$(window).bind("scroll", function(){
		if(stream_time <= stream_time_max)
		{
			var _height = new Array();
			line.each(function(i, item){
				_height.push($(this).height());
			});
			if($(document).scrollTop() + $(window).height() > $(document).height() - 5) {
				stream_pic(stream_time,_height);
				stream_time++;
			}
		}else{
			stream_change(1);
		}
	})

	function stream_change(o){
		if(o==1){
			//隐藏正在加载，显示分页
			$('.pbl_login').hide();
			$('.pagingpul').show();
		}else{
			//与上面相反
			$('.pbl_login').show();
			$('.pagingpul').hide();
		}
	}
	stream_pic(1,_height);
	function stream_pic(stream_time,_height){
		stream_change(2);
		$.ajax({
			dataType:'json', 
			type:'POST',
			url:'/index.php/saylove',
			data:{'_height':_height,'page':page,'stream_time':stream_time},
			cache:false,
			success:function(data)
			{
				if(data.status == 1)
				{
					$.each(data.list,function(i,pic)
					{
						str='';
						str+='<div class="one"><div class="onepic">'
						str+='<a href="/index.php/user" class="hot_add"><div>'+pic.name+'</div></a></div>'
						str+='<div class="onedes" height="'+pic.height+'">'+pic.info+'</div><div class="toname">'+pic.toname+'</div><div class="onetit">眼缘：0</div>'
						for(var i=0;i<4;i++)
						{
							if(pic.sort == i){line.eq(i).append(str);}
						}
					})

				}else
				{
					stream_change(1);
				}
			}
		})
	}
})
</script>
</html>