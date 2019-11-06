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
<div class="perfect">
	<div class="pet_na"><a href="/">Pet Charm—宠之魅</a></div>
	<div class="login_per">
		<form action="/index.php/home/login/upload?id=<?php echo ($id); ?>" method="post" enctype="multipart/form-data">
			<div class="login_div">头像：<input type="file" name="picture" /></div>
			<div class="login_div">城市：
				<select name="prov" id="prov">
					<?php if(is_array($city)): foreach($city as $key=>$vo): ?><option value ="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
				</select>
			</div>
			<div class="login_div">生日：
				<select name="birthy" id="birthy">
					<?php $__FOR_START_7315__=$start;$__FOR_END_7315__=$end;for($i=$__FOR_START_7315__;$i < $__FOR_END_7315__;$i+=1){ ?><option value ="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
				</select>
				<select name="birthm" id="birthm">
					<?php $__FOR_START_9424__=1;$__FOR_END_9424__=13;for($i=$__FOR_START_9424__;$i < $__FOR_END_9424__;$i+=1){ ?><option value ="<?php echo ($i); ?>"><?php if(($i < 10)): ?>0<?php echo ($i); else: echo ($i); endif; ?></option><?php } ?>
				</select>
				<select name="birthd" id="birthd">
					<?php $__FOR_START_15561__=1;$__FOR_END_15561__=32;for($i=$__FOR_START_15561__;$i < $__FOR_END_15561__;$i+=1){ ?><option value ="<?php echo ($i); ?>"><?php if(($i < 10)): ?>0<?php echo ($i); else: echo ($i); endif; ?></option><?php } ?>
				</select>		
			</div>
			<div class="login_div">邮箱：<input type="text" name="email" /></div>
			<div class="login_div">介绍：</br><textarea rows="4" cols="40" name="say_hello"></textarea></div>
			<div class="p_subinsert"><input type="submit" name="submit" value="提交" /> <a href="/">首页</a> <input type="reset" name="reset" value="重置" /></div>
		</form>
	</div>
</div>
</body>
<script>
$(function(){
	/*
	$('#birthy').change(function(){
		var str='';
		$('#birthm').children('option').remove();
		for(var i=1;i<=12;i++)
		{
			if(i<10){i = '0'+i;}
			str+='<option value ="'+i+'">'+i+'</option>'
		}
		$('#birthm').append(str);
	})
	$('#birthm').change(function(){
		var year = $('#birthy').val();
		var month = $('#birthm').val();
		$.ajax({
			dataType:'json', 
			type:'POST',
			url:'/index.php/ajax/getdateD',
			data:{'year':year,'month':month},
			cache:false,
			success:function(day)
			{
				if(day.status == 1)
				{
					var str='';
					$('#birthd').children('option').remove();
					for(var i=1;i<=day.data;i++)
					{
						if(i<10){i = '0'+i;}
						str+='<option value ="'+i+'">'+i+'</option>'
					}
					$('#birthd').append(str);
				}
			}
		})
	})
	*/
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
					$.each(data.data,function(i,city){
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