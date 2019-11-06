<?php
namespace Home\Model;
use Think\Model;
class petSayloveModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->petSaylove = M('pet_saylove');
	}

	public function getAll()
	{	
		$result = $this->petSaylove->order('posttime desc')->select();
		return $result;
	}
	public function getSel($where="")
	{	
		$result = $this->petSaylove->where($where)->order('posttime desc')->select();
		return $result;
	}
	public function getPage($where='',$page,$perNum)
	{
		$where = !empty($where) ? $where : '';
		$result = $this->petSaylove->where($where)->order('posttime desc')->page($page,$perNum)->select();
		return $result;
	}
	public function getCount($where='')
	{
		$where = !empty($where) ? $where : '';
		$infoCount = $this->petSaylove->where($where)->count();	
		return $infoCount;
	}
	public function insert($data)
	{
		if(!empty($data))
		{
			$result = $this->petSaylove->add($data);
			return $result;
		}
	}
	public function del($id)
	{
		if($id)
		{
			$result = $this->petSaylove->where('id='.$id)->delete();
			return $result;
		}
	}
	public function edit($id,$data)
	{
		if($id && !empty($data))
		{
			$result = $this->petSaylove->where('id='.$id)->save($data);
			return $result;
		}
	}
}
?>