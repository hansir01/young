<?php if (!defined('THINK_PATH')) exit();?>
<script type="text/javascript">
	function toggleFrame(){
		var frameVal = top.document.getElementById("bottomFrame").cols;
		if(frameVal=="150,8,*"){
			top.document.getElementById("bottomFrame").cols="0,8,*";
			document.getElementById("img1").src = "/Public/images/admin/right.jpg";
		}else{
			top.document.getElementById("bottomFrame").cols="150,8,*";
			document.getElementById("img1").src = "/Public/images/admin/left.jpg";
		}
	}
</script>
<body style="margin:0px; padding:0px; background:url(/Public/images/admin/line.jpg);">
<table align="left" border="0" cellpadding="0" cellspacing="0" width="10" height="700" >
	<tr>
		<td align="left" style="width:10px;margin:0px; " onClick="toggleFrame();" id="sepImg"><img src="/Public/images/admin/left.jpg" id="img1" width="10" height="10"></td>
	</tr>
</table>
</body>
</html>