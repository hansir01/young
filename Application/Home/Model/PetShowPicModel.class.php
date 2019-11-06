<?php
namespace Home\Model;
use Think\Model;
class petShowPicModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->petShowPic = M('pet_show_pic');
	}

	public function getAll()
	{	
		$result = $this->petShowPic->select();
		return $result;
	}
	public function getPage($where='',$page,$perNum)
	{
		$where = !empty($where) ? $where : '';
		$result = $this->petShowPic->where($where)->page($page,$perNum)->select();
		return $result;
	}
	public function getCount($where='')
	{
		$where = !empty($where) ? $where : '';
		$infoCount = $this->petShowPic->where($where)->count();	
		return $infoCount;
	}
	public function insert($data)
	{
		if(!empty($data))
		{
			$result = $this->petShowPic->add($data);
			return $result;
		}
	}
	public function del($id)
	{
		if($id)
		{
			$result = $this->petShowPic->where('id='.$id)->delete();
			return $result;
		}
	}
	public function edit($id,$data)
	{
		if($id && !empty($data))
		{
			$result = $this->petShowPic->where('id='.$id)->save($data);
			return $result;
		}
	}
}
?>