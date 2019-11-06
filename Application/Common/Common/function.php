<?php
function pageHtml($totalPage,$page,$lenth=5,$url="?")//$length最好是单数
{
	$str = '';
	//$str.= '<span style="margin:0 5px;">'.L('sPage').$totalPage.L('ePage').'</span>';
	$str.= '<a href="'.$url.'page=1"><img src="/Public/images/home/phome.gif"></a>';//首页
	if ($page != 1){//页数不等于1
		$str.= '<a href="'.$url.'page='.($page-1).'"><img src="/Public/images/home/prepul.gif"></a>';
	}
	if($page < ceil($lenth/2))
	{
		for ($i=1;$i<=$lenth;$i++) {  //循环显示出页面
			$ahover = $page == $i ? 'id="paging_ahover"' : '';
			$str.='<a class="pagenum" '.$ahover.' href="'.$url.'page='.$i.'">'.$i.'</a>';
		}
	}

	if($page >= ceil($lenth/2) && $page <= $totalPage-ceil($lenth/2)){

		for ($i=$page-ceil($lenth/2)+1;$i<=$page+ceil($lenth/2)-1;$i++) {  //循环显示出页面
			$ahover = $page == $i ? 'id="paging_ahover"' : '';
			$str.='<a class="pagenum" '.$ahover.' href="'.$url.'page='.$i.'">'.$i.'</a>';
		}
	}
	if($page <= $totalPage && $page > $totalPage-ceil($lenth/2)){
		if($totalPage-4 < 0) return false;
		for ($i=$totalPage-4;$i<=$totalPage;$i++) {  //循环显示出页面
			$ahover = $page == $i ? 'id="paging_ahover"' : '';
			$str.='<a class="pagenum" '.$ahover.' href="'.$url.'page='.$i.'">'.$i.'</a>';
		}
	}

	if ($page<$totalPage) { //如果page小于总页数,显示下一页链接
		$str.='<a href="'.$url.'page='.($page+1).'"><img src="/Public/images/home/nextpul.gif"></a>';
	}
	$str.='<a href="'.$url.'page='.$totalPage.'"><img src="/Public/images/home/pend.gif"></a>';
	return $str;
	
}

function filename()
{
	return strtotime('now').rand(10000,90000);
}

function handleStream($_height,$result,$field)
{
	foreach($result as $key => &$val)
	{
		if(!empty($val[$field]))
		{
			list($width, $height, $type, $attr) = getimagesize(PIC_URL.$val[$field]);
			$val['height'] = $height ? $height*210/$width : 210;
			foreach($_height as $k => &$v)
			{
				if($_height[$k] == min($_height))
				{
					$val['sort'] = $k;
					$v = $v+$val['height']+84;
					break;
				}
			}
		}
	}
	return $result;
}

?>