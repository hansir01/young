<?php
namespace Home\Model;
use Think\Model;
class cityModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->City = M('city');
	}
	public function getByid($id)
	{
		$data = $this->City->where('p_id='.$id)->select();
		return $data;
	}
}
?>