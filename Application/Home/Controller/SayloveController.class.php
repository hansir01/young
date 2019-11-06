<?php
namespace Home\Controller;
use Think\Controller;
class SayloveController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->PetSaylove = new petSayloveModel();
		$this->PetSaylove = D('petSaylove');
		//$this->User = new userModel();
		$this->User =  D('user');
		$username = isset($_SESSION['username']) ? session('username') : '';
		$this->assign('username',$username);
		$this->_height = I('post._height',array(0,0,0,0));
		$this->perNum = 24;//分页页数
		$this->len = 4;//循环次
	}
	function index()
	{
		$where = '';//sql查询条件
		$stream_time = I('post.stream_time',1);
		$totalnum = $this->PetSaylove->getCount($where);//总数
		$totalPage=ceil($totalnum/($this->perNum*$this->len)); //计算出总页数
		$page = IS_POST ? I('post.page',1) : I('get.page',1);
		if(IS_AJAX)
		{
			$spage = ($page-1)*$this->len+$stream_time;//加载数据开始截取数据
			$result = $this->PetSaylove->getPage($where,$spage,$this->perNum);//获取所有数据
			if(!empty($result))
			{
				foreach($result as $key => &$val)
				{
					$val['name'] = empty($val['name']) ? '匿名' : $val['name'] ;
					$val['toname'] = empty($val['toname']) ? '匿名' : $val['toname'] ;
				}
				$pic_rs = $this->handleStr($this->_height,$result);//处理所有数据，把数据分成几组
				$data['list'] = $pic_rs;
				$data['status'] = 1;
				if($pic_rs)
				{
					$this->ajaxReturn($data);//ajax操作成功
				}else
				{
					$data['status'] = 0;
					$this->ajaxReturn($data);//ajax操作失败
				}
			}else
			{
				$data['status'] = 0;
				$this->ajaxReturn($data);//ajax操作失败
			}
						
		}else{
			$pageHtml = pageHtml($totalPage,$page,5);
			$this->assign('totalnum',$totalnum);
			$this->assign('pageHtml',$pageHtml);
			$this->assign('totalPage',$totalPage);
			$this->assign('page',$page);
			$this->assign('perNum',$this->perNum);
			$this->assign('len',$this->len);
			$this->display('index');
		}
	}

	function handleStr($_height,$result)
	{
		foreach($result as $key => &$val)
		{
			$val['height'] = ceil(strlen($val['info'])/51)*20;
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
		return $result;
	}
}
?>