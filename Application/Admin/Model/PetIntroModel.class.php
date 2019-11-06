<?php
namespace Admin\Model;
use Think\Model;
class petIntroModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->petIntro = M('pet_intro');
	}

	public function getAll()
	{	
		$result = $this->petIntro->order('posttime desc')->select();
		return $result;
	}
	public function getPage($where='',$page,$perNum)
	{
		$where = !empty($where) ? $where : '';
		$result = $this->petIntro->where($where)->order('posttime desc')->page($page,$perNum)->select();
		return $result;
	}
	public function getCount($where='')
	{
		$where = !empty($where) ? $where : '';
		$infoCount = $this->petIntro->where($where)->count();	
		return $infoCount;
	}
	public function insert($data)
	{
		if(!empty($data))
		{
			$result = $this->petIntro->add($data);
			return $result;
		}
	}
	public function del($id)
	{
		if($id)
		{
			$result = $this->petIntro->where('id='.$id)->delete();
			return $result;
		}
	}
	public function edit($id,$data)
	{
		if($id && !empty($data))
		{
			$result = $this->petIntro->where('id='.$id)->save($data);
			return $result;
		}
	}
}
?>