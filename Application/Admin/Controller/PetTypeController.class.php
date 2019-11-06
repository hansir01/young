<?php
namespace Admin\Controller;
use Think\Controller;
class PetTypeController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->PetType = new petTypeModel();
		$this->PetType = D('petType');
	}
	function index()
	{
		$this->display();
	}
	function type()
	{
		$this->display('type');
	}
	function typeadd()
	{

	}
	function typeedit()
	{
		$this->display('typeedit');
	}
} 
?>