<?php
namespace Home\Controller;
use Think\Controller;
class LogoutController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		session('userid',null);
		session('username',null);
		//header("Location:/index.php");
		$this->success('退出成功','/index.php');
	}

}
?>