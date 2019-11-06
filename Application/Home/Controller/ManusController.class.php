<?php
namespace Home\Controller;
use Think\Controller;
class ManusController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->PetStory =  D('petStory');
		//$this->PetStory = new petStoryModel();
		//$this->PetShow = new petShowModel();
		//$this->PetShowPic = new petShowPicModel();
		//$this->PetType = new petTypeModel();
		$this->PetShow = D('petShow');
		$this->PetShowPic = D('petShowPic');
		$this->PetType = D('petType');
		if(!isset($_SESSION['username']) && empty($_SESSION['username']))
		{
			$this->success('请先登录', '/index.php/login');
			exit;
		}
		$username = isset($_SESSION['username']) ? session('username') : '';
		$this->assign('username',$username);
	}

	function index()
	{
		$sol = 1;
		$this->assign('sol',$sol);
		$this->display();
	}
	function saylove()
	{
		$sol = 2;
		$this->assign('sol',$sol);
		$this->display('index');
	}
	function show()
	{
		$sol = 0;
		$type = $this->PetType->getByid(0);
		$this->assign('type',$type);
		$this->assign('sol',$sol);
		$this->display('index');
	}
	function uppetshow()
	{
		$data['title'] = I('post.title','');
		$data['info'] = I('post.info','');
		$stypeid = I('post.stypeid',0);
		$data['tid'] = $stypeid == 0 ? I('post.typeid') : I('post.stypeid');
		$data['u_id'] = isset($_SESSION['userid']) && empty($_SESSION['userid']) ? 0 :  session('userid');
		$data['posttime'] = date('Y-m-d H:i:s',time());
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  'Uploads/images/'.date('Ymd').'/';// 设置附件上传目录

		$upload->saveRule = 'filename';
		if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			$data['home_pic'] = '/'.$info[0]['savepath'].$info[0]['savename'];
			$show_id = $this->PetShow->insert($data);
			if($show_id){
				foreach($info as $key => &$val){
					$pic_data['pic_url'] = '/'.$val['savepath'].$val['savename'];
					$pic_data['show_id'] = $show_id;
					$pic_data['posttime'] = date('Y-m-d H:i:s',time());
					$res = $this->PetShowPic->insert($pic_data);
					if(!$res){
						$this->error('操作失败');exit;
					}
				}
				$this->success('操作成功',"/index.php/user");exit;
			}else{
				$this->error('操作失败');exit;
			}
		}
	}

	function upsaylove()
	{
		$data['name'] = I('post.name','');
		$data['toname'] = I('post.toname','');
		$data['info'] = I('post.info','');
		$data['u_id'] = isset($_SESSION['userid']) && empty($_SESSION['userid']) ? 0 :  session('userid');
		$data['posttime'] = date('Y-m-d H:i:s',time());
		if(!empty($data['name']) && !empty($data['toname']) && !empty($data['info']))
		{
			$result = $this->PetSaylove->insert($data);
			if($result){
				$this->success('操作成功','/index.php');
			}else{
				$this->error('操作失败');
			}
		}else{
			$this->error('操作失败');
		}

	}
	function upstory()
	{
		$data['author'] = I('post.author','');
		$data['info'] = I('post.info','');
		$data['u_id'] = isset($_SESSION['userid']) && empty($_SESSION['userid']) ? 0 :  session('userid');
		$data['posttime'] = date('Y-m-d H:i:s',time());

		if(!empty($data['author']) && !empty($data['info']))
		{
			$result = $this->PetStory->insert($data);
			if($result){
				$this->success('操作成功','/index.php');
			}else{
				$this->error('操作失败');
			}
		}else{
			$this->error('操作失败');
		}

	}
}
?>