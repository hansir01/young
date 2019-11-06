$(function(){
	//alert(screen.width);
	//获取屏幕分辨率
	var screen_width = screen.width;
	if(screen_width >= 1440){
		//显示6列，否则显示4列
		$('#m').prepend('<div class="dc"></div><div class="dc"></div>');
		$("#cnav").removeClass("picture_cnav");
		$("#cnav").addClass("picture_cnav6");
		$("#m").removeClass("m");
		$("#m").addClass("msix");
		$("#mh").removeClass("m");
		$("#mh").addClass("msix");
	}
	var stream_time = 2;
	var stream_time_max = 5;//加载4次停止
	var cur_page=$('#cur_page').val();
	var where=$('#where').val();
	var line = $('.dc');
	//列的个数-1为最大序号
	line_len = line.length-1;
	//alert(line_len);
	_height = Array();
	_height[line_len] = $('#hot_two').height();
	function stream_pic(t)
	{
		stream_change(2);
		//数组预期长度
		var sum = t==1 ? 23 : 24;
		$.ajax({
			dataType:'json', 
			type:'POST',
			url:'/zkbm/snap_view_list.php',
			data:'stream_time='+t+'&cur_page='+cur_page+'&where='+where,
			cache:false,
			success:function(msg)
			{
				//数组实际长度
				var n = 0;
				$.each(msg,function(i,pic)
				{
					n++;
					min_h = 0, line_min = 0;
					line.each(function(i, item){
						_height[i] = $(this).height();
						min_h = (min_h>_height[i] || i==0) ? _height[i] : min_h; 
						if(min_h == _height[i] && _height[i]!=_height[line_min])line_min=i; 
					});
					str='';
					str+='<div class="one"><div class="onepic">';
					str+='<div class="price">￥'+pic.price+'</div>';
					str+='<a class="hot_add" id="'+pic.goods_id+'" href="/zkbm/product_'+pic.goodsurl+'/" title="'+pic.goods_name+'" target="_blank">';
					str+='<img src="'+pic.default_image+'" height="'+pic.img_height+'" alt="'+pic.goods_name+'" /></a></div>';
					str+='<div class="onedes">'+pic.goods_name+'</div>';
					str+='<div class="onetit">眼缘：'+pic.eye+'</div></div>';
					line.eq(line_min).append(str);
				})
				//实际长度小于预期长度则说明没有数据了，停止瀑布流，显示分页
				if(n<sum){
					stream_time = stream_time_max;
					stream_change(1);
				}
			}
		})
	}
	stream_pic(1);
	$(window).bind("scroll", function(){
		if(stream_time < stream_time_max)
		{
			if($(document).scrollTop() + $(window).height() > $(document).height() - 220) {
				stream_pic(stream_time);
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
	//眼缘
	$('.hot_add').live('click',function(){
		var goods_id=$(this).attr("id");
		var act = "hot_add";
		$.ajax({
			url:"/zkbm/snap_view_detail.php",
			data:{goods_id:goods_id,act:act},
			async: false, //是否异步，false，为不异步
			cache: false
		})
	})
})
