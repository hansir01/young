<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html Public "-//W3C//DTD XHTML 1.0 Transitional//EN">
<!-- saved from url=(0036)http://www.lanmayi.cn/zkbm/list_679/ -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<style media="screen"></style>
	<title><?php echo (L("title")); ?></title>
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
		<h1><a href="/"><?php echo (L("header")); ?></a></h1>
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
<div class="xdaohang">
	<ul>
		<li class="on"><a href="/index.php/manus">故事区</a></li>
		<li>|</li>
		<li><a href="/index.php/manus/saylove">说爱区</a></li>
		<li>|</li>
		<li><a href="/index.php/manus/show">宠物show</a></li>
	</ul>

</div>

<?php if(($sol == 1)): ?><div class="m" style="padding:0">
	<form action="/index.php/manus/upstory" method="post" >
			<div class="upload">
				<p>story：</p>
				<div class="uploadpic"><div>info：</div><textarea rows="5" cols="60" name="info"></textarea></div>
				<div class="uploadpic">name：<input type="text" name="author" value="匿名"/></div>
				<input class="submit" type="submit" name="submit" value="提交" />
				<input class="submit" type="reset" name="submit" value="重置" />
			</div>
		</p>
	</form>
</div>
<?php elseif(($sol == 2)): ?>
<div class="m" style="padding:0">
	<form action="/index.php/manus/upsaylove" method="post" >
			<div class="upload">
				<p>sayLove：</p>
				<div class="uploadpic">toname：<input type="text" name="name" value="匿名" /></div>
				<div class="uploadpic"><div>info：</div><textarea rows="5" cols="60" name="info"></textarea></div>
				<div class="uploadpic">name：<input type="text" name="toname" value="匿名"/></div>
				<input class="submit" type="submit" name="submit" value="提交" />
				<input class="submit" type="reset" name="submit" value="重置" />
			</div>
		</p>
	</form>
</div>
<?php else: ?>
<div class="m" style="padding:0">
	<form action="/index.php/manus/uppetshow" method="post" enctype="multipart/form-data">
			<div class="upload">
				<p>petShow：</p><br />
				<input id="add" class="add" type="button" value="增加图片" />
				<div class="uploadfile">
					<input type="file" name="pictures[]" /><input class="delete_0" onClick="removeClick(0)" type="button" value="删除" />
				</div>
				<div class="uploadpic">title：<input type="text" name="title"/></div>
				<div class="uploadpic">type：
					<select name="typeid" id="type">
						<?php if(is_array($type)): foreach($type as $key=>$vo): ?><option value ="<?php echo ($vo["id"]); ?>"><?php echo ($vo["typename"]); ?></option><?php endforeach; endif; ?>
					</select>
				</div>
				<div class="uploadpic"><div>info：</div><textarea rows="5" cols="60" name="info"></textarea></div>
				<input class="submit" type="submit" name="submit" value="提交" />
				<input class="submit" type="reset" name="submit" value="重置" />
			</div>
		</p>
	</form>
</div><?php endif; ?>
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
<script type="text/javascript">
$(function(){
	var line = 1;
	$("#add").click(function(){	
		var str = '<div class="uploadfile"><input type="file" name="pictures[]" /><input class="delete_'+line+'" onClick="removeClick('+line+')" type="button" value="删除" /></div>'
		$("#add").after(str);
		line++;
	})

	$('#type').change(function(){
		var typeid = $('#type').val();
		$.ajax({
			dataType:'json', 
			type:'POST',
			url:'/index.php/ajax/getType',
			data:{'typeid':typeid},
			cache:false,
			success:function(data)
			{
				$("#son").remove();
				if(data.status == 1)
				{
					str = '<select name="stypeid" id="son">'
					$.each(data.data,function(i,sontype){
						str += '<option value ="'+sontype.id+'">'+sontype.typename+'</option>'
					})
					str += '</select>'
					$('#type').after(str);
				}else
				{
					$("#son").remove();
				}
			}
		})
	})
})
function removeClick(i)
{	
	if($('.uploadfile').length != 1)
		$('.delete_'+i).parent().remove()
}
</script>
</html>