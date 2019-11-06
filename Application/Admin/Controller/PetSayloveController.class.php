<?php
namespace Admin\Controller;
use Think\Controller;
class PetSayloveController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$this->display();
	}
}
?>