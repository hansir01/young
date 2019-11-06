<?php
namespace Home\Model;
use Think\Model;
class petTypeModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->petType = M('pet_type');
	}
	public function getSel($where='')
	{	
		$result = $this->petType->where($where)->select();
		return $result;
	}
	public function getByid($id)
	{
		$data = $this->petType->where('p_id='.$id)->select();
		return $data;
	}
	public function getCount($where='')
	{
		$where = !empty($where) ? $where : '';
		$infoCount = $this->petType->where($where)->count();	
		return $infoCount;
	}
	public function insert($data)
	{
		if(!empty($data))
		{
			$result = $this->petType->add($data);
			return $result;
		}
	}
	public function del($id)
	{
		if($id)
		{
			$result = $this->petType->where('id='.$id)->delete();
			return $result;
		}
	}
	public function edit($id,$data)
	{
		if($id && !empty($data))
		{
			$result = $this->petType->where('id='.$id)->save($data);
			return $result;
		}
	}

}
?>