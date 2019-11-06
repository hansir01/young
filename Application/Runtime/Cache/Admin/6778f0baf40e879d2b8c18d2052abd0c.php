<?php if (!defined('THINK_PATH')) exit();?>
<style type="text/css">
	body{
		margin:0px auto; 
		padding:0px;
		background:#3AF9F9;
		font-size:16px;
		font-weight: bold;
	}
	#box {
		height: 400px;
	}
	#menu a{
		text-decoration:none;color: #000000;
		text-align: center;
	}
	#menu li{
		margin-top: 15px;
	}
</style>
<body>
<div id="box">	
	<ul id="menu">
		<?php if(is_array($menu)): foreach($menu as $key=>$v): ?><li><a href="<?php echo ($v["url"]); ?>" target="mainFrame"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; ?>
	</ul>
</div>
</body>
</html>