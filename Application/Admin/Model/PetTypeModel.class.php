<?php
namespace Admin\Model;
use Think\Model;
class petTypeModel extends Model
{
	//构造函数
	public function __construct()
	{
		parent::__construct();
		//宠物类型表实例化
		$this->petType = M('pet_type');
	}
	public function getSel($where='')
	{	
		$result = $this->petType->where($where)->select();
		return $result;
	}
	public function getByid($id)
	{
		$data = $this->petType->where('p_id='.$id)->find();
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