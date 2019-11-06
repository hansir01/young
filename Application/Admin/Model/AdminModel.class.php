<?php
namespace Admin\Model;
use Think\Model;
class adminModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->Admin = M('admin');
	}
	public function getOne($where)
	{	
		if($where)
		{
			$result = $this->Admin->where($where)->find();
			return $result;
		}
	}
	public function getCount($where='')
	{
		$where = !empty($where) ? $where : '';
		$infoCount = $this->Admin->where($where)->count();
		return $infoCount;
	}
	public function insert($data)
	{
		if(!empty($data))
		{
			$result = $this->Admin->add($data);
			return $result;
		}
	}
	public function del($id)
	{
		if($id)
		{
			$result = $this->Admin->where('id='.$id)->delete();
			return $result;
		}
	}
	public function edit($id,$data)
	{
		if($id && !empty($data))
		{
			$result = $this->Admin->where('id='.$id)->save($data);
			return $result;
		}
	}

}
?>