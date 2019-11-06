<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller
{
	public $userid,$perNum;
	public function __construct()
	{
		parent::__construct();
		//$this->User = new userModel();
		$this->User =  D('user');
		//$this->City = new cityModel('city');
		$this->City =  D('city');
		//$this->PetSaylove = new petSayloveModel();
		$this->PetSaylove =  D('petSaylove');
		//$this->PetStory = new petStoryModel();
		$this->PetStory =  D('petStory');
		//$this->petShow = new petShowModel();
		$this->PetShow =  D('petShow');
		if(!isset($_SESSION['username']) && empty($_SESSION['username'])){
			header("location:/index.php");
		}
		$username = isset($_SESSION['username']) ? session('username') : '';
		$this->userid = isset($_SESSION['userid']) ? session('userid') : '';
		$this->assign('username',$username);
		$this->perNum = 10;//分页页数
	}

	function index()
	{
		$this->leftuser();
		$sol = 1;
		$page = I('get.page',1);
		$total = $this->PetStory->getCount("u_id = ".$this->userid);
		$totalPage = ceil($total/$this->perNum);
		$story_data = $this->PetStory->getPage("u_id = ".$this->userid,$page,$this->perNum);
		$pageHtml = pageHtml($totalPage,$page,5);
		$this->assign('pageHtml',$pageHtml);
		$this->assign('totalPage',$totalPage);
		$this->assign('story_data',$story_data);
		$this->assign('sol',$sol);
		$this->display();
	}
	function saylove()
	{
		$this->leftuser();
		$sol = 2;
		$page = I('get.page',1);
		$total = $this->PetSaylove->getCount("u_id = ".$this->userid);
		$totalPage = ceil($total/$this->perNum);
		$love_data = $this->PetSaylove->getPage("u_id = ".$this->userid,$page,$this->perNum);
		$pageHtml = pageHtml($totalPage,$page,5);
		$this->assign('pageHtml',$pageHtml);
		$this->assign('love_data',$love_data);
		$this->assign('totalPage',$totalPage);
		$this->assign('sol',$sol);
		$this->display('index');
	}
	function show()
	{
		$this->leftuser();
		$sol = 3;
		$page = I('get.page',1);
		$total = $this->PetShow->getCount("u_id = ".$this->userid);
		$totalPage = ceil($total/$this->perNum);
		$show_data = $this->PetShow->getPage("u_id = ".$this->userid,$page,$this->perNum);
		$pageHtml = pageHtml($totalPage,$page,5);
		$this->assign('pageHtml',$pageHtml);
		$this->assign('totalPage',$totalPage);
		$this->assign('show_data',$show_data);
		$this->assign('sol',$sol);
		$this->display('index');
	}

	function useredit()
	{
		$this->leftuser();
		$sol = 0;
		$data['id'] = I('get.id',0);
		$city = $this->City->getByid(0);
		$this->assign('start',1960);
		$this->assign('end',date('Y')+1);
		$this->assign('city',$city);
		$this->assign('dateY',$dataY);
		$this->assign('sol',$sol);
		$this->display('index');
	}

	function leftuser()
	{
		$rs = $this->User->getOne('id = '.$this->userid);
		$this->assign('rs',$rs);
	}
}