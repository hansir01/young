<?php
namespace Admin\Model;
use Think\Model;
class menuModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->Menu = M('menu');
	}
}
?>