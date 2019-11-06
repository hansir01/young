<?php
namespace Home\Controller;
use Think\Controller;
/*
*author:hanshaobo
*date:2014-09-27
*descripction:地栏的连接显示内容
*/
class FooterController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	function about()
	{
		$this->display('about');
	}
	function contact()
	{
		$this->display('contact');
	}
	function service()
	{
		$this->display('service');
	}
	function exemption()
	{
		$this->display('exemption');
	}
	function copyright()
	{
		$this->display('copyright');
	}
	function opinion()
	{
		$this->display('opinion');
	}
	function help()
	{
		$this->display('help');
	}

}
?>