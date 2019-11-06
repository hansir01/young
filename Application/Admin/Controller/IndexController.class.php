<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->Menu = new menuModel();
		$this->Menu = D('menu');
		//$this->Admin = new adminModel();
		$this->Admin = D('admin');
	}
	public function index()
	{
		if(isset($_SESSION['adminName']) && !empty($_SESSION['adminName']))
		{
			$admin = session('adminName');
			$this->assign('admin',$admin);
			$this->display();
		}else{
			header("Location:/admin.php/index/login");
		}
	}
	public function header()
	{
		if(isset($_SESSION['adminName']) && !empty($_SESSION['adminName']))
		{
			$admin = session('adminName');
			$this->assign('admin',$admin);
		}else{
			header("Location:/admin.php/index/login");
		}
		$menu = $this->Menu->where('pid = 0')->select();
		$this->assign('menu',$menu);
		$this->display('header');
	}
	public function left()
	{
		$id = I('id') ? I('id') : 1;
		$menu = $this->Menu->where('pid = '.$id)->select();
		$this->assign('menu',$menu);
		$this->display('left');
	}
	public function seprator()
	{
		$this->display('seprator');
	}

	public function login()
	{
		$data['adminname'] = I('post.adminname','');
		$data['password'] = md5(I('post.password',''));
		if(!empty($data['adminname'] ) && !empty($data['password']))
		{
			$result = $this->Admin->getOne('adminname="'.$data['adminname'].'" and password="'.$data['password'].'"');
			if($result)
			{
				session('adminId',$result['id']);
				session('adminName',$result['adminname']);
				header("Location:/admin.php");
			}else{
				$this->error('登录失败');exit;
			}
		}
		$this->display('login');

	}

	public function logout()
	{
		session('adminId',null);
		session('adminName',null);
		if(!isset($_SESSION['adminName']) && empty($_SESSION['adminName']))
		{
			$data['success'] = 'sucess';
			$this->ajaxReturn($data,"操作成功！",1);//ajax操作成功
		}else{
			$data['success'] = 'error';
			$this->ajaxReturn($data,"操作失败！",0);//ajax操作成功
		}
	}

	public function defaultindex()
	{
		if(isset($_SESSION['adminName']) && !empty($_SESSION['adminName']))
		{
			$admin = session('adminName');
			$this->assign('admin',$admin);
		}else{
			header("Location:/admin.php/index/login");
		}
		$this->display('default');
	}
}

?>