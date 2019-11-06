<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{
	public $_height,$perNum;
	public function __construct()
	{
		parent::__construct();
		//$this->PetIntro = new petIntroModel();
		//$this->PetType = new petTypeModel();
		$this->PetIntro = D('petIntro');
		$this->PetType = D('petType');
		$type_data = $this->PetType->limit(20)->select();
		$this->assign('type_data',$type_data);
		$username = isset($_SESSION['username']) ? session('username') : '';
		$this->assign('username',$username);
		$this->_height = I('post._height',array(0,0,0,0));
		$this->perNum = 24;//分页页数
		$this->len = 4;//循环次
	}
	public function index()
	{
		$typeid = IS_POST ? I('post.typeid',0) : I('get.typeid',0);
		$url = $typeid == 0 ? "/index.php?" : "/index.php?typeid=".$typeid."&";
		$where = $typeid == 0 ? '' : "tid = ".$typeid; //sql查询条件
		$stream_time = I('post.stream_time',1);
		$totalnum = $this->PetIntro->getCount($where);//总数
		$totalPage=ceil($totalnum/($this->perNum*$this->len)); //计算出总页数
		$page = $this->IS_POST ? I('post.page',1) : I('get.page',1);
		if(IS_AJAX)
		{
			$spage = ($page-1)*$this->len+$stream_time;//加载数据开始截取数据
			$result = $this->PetIntro->getPage($where,$spage,$this->perNum);//获取所有数据
			if(!empty($result))
			{
				$pic_rs = handleStream($this->_height,$result,'pic_url');//处理所有数据，把数据分成几组
				$data['list'] = $pic_rs;
				$data['status'] = 1;
				if($pic_rs)
				{
					$this->ajaxReturn($data);//ajax操作成功
				}else
				{
					$data['status'] = 0;
					$this->ajaxReturn($$data);//ajax操作失败
				}
			}else
			{
				$data['status'] = 0;
				$this->ajaxReturn($$data);//ajax操作失败
			}
			
						
		}else{
			$pageHtml = pageHtml($totalPage,$page,5,$url);
			$this->assign('typeid',$typeid);
			$this->assign('totalnum',$totalnum);
			$this->assign('pageHtml',$pageHtml);
			$this->assign('totalPage',$totalPage);
			$this->assign('page',$page);
			$this->assign('perNum',$this->perNum);
			$this->assign('len',$this->len);
			$this->display('index');
		}
	}

	public function detail()
	{
		$data['id'] = I('get.id',0);
		$result = $this->PetIntro->where('id = '.$data['id'])->find();
		$this->assign('result',$result);
		$this->display('detail');
	}

}
?>