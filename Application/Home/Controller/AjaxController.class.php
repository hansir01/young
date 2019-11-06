<?php
namespace Home\Controller;
use Think\Controller;
class AjaxController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->City = new cityModel('city');
		//$this->PetType = new petTypeModel();
		$this->City =  D('city');
		$this->PetType =  D('petType');
	}
	/*
	function getdateD($year,$month)
	{
		$year = I('post.year',0);
		$month = I('post.month',0);
		if($year != 0 && $month != 0)
		{
			switch($month){
				case 1:case 3: case 5:case 7:case 8:case 10:case 12: $day =  31;break;
				case 4:case 6:case 9:case 11: $day =  30;break;
				case 2:if(($year%4==0)&&($year%100!=0)||($year%400==0)){ $day =  29;}else{$day =  28;break;}		
			}
			$this->ajaxReturn($day,"操作成功",1);
		}else
		{
			$this->ajaxReturn(0,"操作失败",0);
		}	
	}
	*/
	function getCity()
	{
		$prov = I('post.prov',0);
		if($prov != 0){
			$city = $this->City->getByid($prov);
			$data['city'] = $city;
			$data['status'] = 1;
			if($city){
				$this->ajaxReturn($data);
			}else
			{
				$data['status'] = 0;
				$this->ajaxReturn($data);
			}
		}else
		{
			$data['status'] = 0;
			$this->ajaxReturn($data);
		}
	}
	function getType()
	{
		$typeid = I('post.typeid',0);
		if($typeid != 0)
		{
			$type = $this->PetType->getByid($typeid);
			$data['type'] = $type;
			$data['status'] = 1;
			if($type){
				$this->ajaxReturn($data);
			}else{
				$data['status'] = 0;
				$this->ajaxReturn($data);
			}
		}else{
			$data['status'] = 0;
			$this->ajaxReturn($data);
		}
	}
}
?>