<?php
namespace Admin\Model;
use Think\Model;
class petShowModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->petShow = M('pet_show');
	}

	public function getAll()
	{	
		$result = $this->petShow->order('posttime desc')->select();
		return $result;
	}
	public function getSel($where='')
	{
		$where = !empty($where) ? $where : '';
		$result = $this->petShow->where($where)->order('posttime desc')->select();
		return $result;
	}
	public function getPage($where='',$page,$perNum)
	{
		$where = !empty($where) ? $where : '';
		$result = $this->petShow->where($where)->order('posttime desc')->page($page,$perNum)->select();
		return $result;
	}
	public function getCount($where='')
	{
		$where = !empty($where) ? $where : '';
		$infoCount = $this->petShow->where($where)->count();	
		return $infoCount;
	}
	public function insert($data)
	{
		if(!empty($data))
		{
			$result = $this->petShow->add($data);
			return $result;
		}
	}
	public function del($id)
	{
		if($id)
		{
			$result = $this->petShow->where('id='.$id)->delete();
			return $result;
		}
	}
	public function edit($id,$data)
	{
		if($id && !empty($data))
		{
			$result = $this->petShow->where('id='.$id)->save($data);
			return $result;
		}
	}
}
?>