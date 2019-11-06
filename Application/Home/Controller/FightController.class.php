<?php
namespace Home\Controller;
use Think\Controller;
class FightController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->PetSaylove = D('petSaylove');
		$this->User =  D('user');
		if(!isset($_SESSION['username']) && empty($_SESSION['username']))
		{
			$this->success('请先登录', '/index.php/login');
			exit;
		}
		$username = isset($_SESSION['username']) ? session('username') : '';
		$this->assign('username',$username);
	
	}
	function index()
	{
		$this->display();

	}
}
?>