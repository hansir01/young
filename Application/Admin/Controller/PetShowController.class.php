<?php
namespace Admin\Controller;
use Think\Controller;
class PetShowController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$this->display();
	}
	function showadd()
	{
		$this->display('showadd');
	}
}
?>