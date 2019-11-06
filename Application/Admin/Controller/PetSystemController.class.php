<?php
namespace Admin\Controller;
use Think\Controller;
class PetSystemController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$this->display();
	}
	function rolelist()
	{
		$this->display('rolelist');
	}
	function role()
	{
		$this->display('role');
	}
	function catalog()
	{
		$this->display('catalog');
	}
	function cataedit()
	{
		$this->display('cataedit2');
	}
}
?>