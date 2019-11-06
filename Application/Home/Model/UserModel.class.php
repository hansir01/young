<?php
namespace Home\Model;
use Think\Model;
class userModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->User = M('user');
	}
	public function getOne($where)
	{	
		if($where)
		{
			$result = $this->User->where($where)->find();
			return $result;
		}
	}
	public function getCount($where='')
	{
		$where = !empty($where) ? $where : '';
		$infoCount = $this->User->where($where)->count();
		return $infoCount;
	}
	public function insert($data)
	{
		if(!empty($data))
		{
			$result = $this->User->add($data);
			return $result;
		}
	}
	public function del($id)
	{
		if($id)
		{
			$result = $this->User->where('id='.$id)->delete();
			return $result;
		}
	}
	public function edit($id,$data)
	{
		if($id && !empty($data))
		{
			$result = $this->User->where('id='.$id)->save($data);
			return $result;
		}
	}

}
?>