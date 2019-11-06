<?php
namespace Admin\Model;
use Think\Model;
class petStoryModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->petStory = M('pet_story');
	}

	public function getAll()
	{	
		$result = $this->petStory->order('posttime desc')->select();
		return $result;
	}
	public function getSel($where=''){
		$where = !empty($where) ? $where : '';
		$result = $this->petStory->where($where)->order('posttime desc')->select();
		return $result;
	}
	public function getPage($where='',$page,$perNum)
	{
		$where = !empty($where) ? $where : '';
		$result = $this->petStory->where($where)->order('posttime desc')->page($page,$perNum)->select();
		return $result;
	}
	public function getCount($where='')
	{
		$where = !empty($where) ? $where : '';
		$infoCount = $this->petStory->where($where)->count();	
		return $infoCount;
	}
	public function insert($data)
	{
		if(!empty($data))
		{
			$result = $this->petStory->add($data);
			return $result;
		}
	}
	public function del($id)
	{
		if($id)
		{
			$result = $this->petStory->where('id='.$id)->delete();
			return $result;
		}
	}
	public function edit($id,$data)
	{
		if($id && !empty($data))
		{
			$result = $this->petStory->where('id='.$id)->save($data);
			return $result;
		}
	}
}
?>