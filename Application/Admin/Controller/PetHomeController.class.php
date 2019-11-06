<?php
namespace Admin\Controller;
use Think\Controller;
class PetHomeController extends Controller
{
	public $perNum;
	public function __construct()
	{
		parent::__construct();
		//$this->petIntro = new petIntroModel();
		$this->petIntro = D('petIntro');
		$this->petType = D('petType');
		$this->perNum = 10;
	}
	public function index()
	{
		$page = I("get.page",0);
		$result = $this->petIntro->getPage($where,0,10);
		foreach ($result as $key => &$value) {
			# code...
			$type = $this->petType->getByid($value['tid']);
			$value['typename'] = $type['typename'];
		}
		$totalnum = $this->petIntro->getCount($where);//总数
		$totalPage = ceil($totalnum/$this->perNum);
		$pageHtml = pageHtml($totalPage,$page,5);
		$this->assign('result',$result);
		$this->assign('totalPage',$totalPage);
		$this->assign('pageHtml',$pageHtml);
		$this->display();
	}
	public function indexAdd()
	{
		echo 22222;
		$this->display('indexAdd');
	}
	public function indexEdit(){
		echo 11111;
		$this->display('indexEdit');
	}
}
?>