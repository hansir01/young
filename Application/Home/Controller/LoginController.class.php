<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->User =  D('user');
		$this->City =  D('city');
	}
	function index()
	{
		$data['username'] = I('post.username','');
		$data['password'] = md5(I('post.password',''));
		if(!empty($data['username'] ) && !empty($data['password']))
		{
			$result = $this->User->getOne('username="'.$data['username'].'" and password="'.$data['password'].'"');
			if($result)
			{	
				session('userid',$result['id']);
				session('username',$result['username']);
				$this->success('登录成功','/index.php/user');exit;
			}else{
				$this->error('登录失败');exit;
			}
		}
		$this->display();
	}

	function register()
	{
		$data['username'] = I('post.username','');
		$data['password'] = md5(I('post.password',''));
		$data['ip'] = IP;
		$repass = I('post.repass','');
		if(!empty($data['username'] ) && !empty($data['password']))
		{
			$usernum = $this->User->getCount('username="'.$data['username'].'"');
			if($usernum > 0)
			{
				$this->error('用户名重复');
			}
			if($data['password'] == md5($repass))
			{
				$id = $this->User->data($data)->add();
				if($id)
				{
					header("Location:/index.php/login/perfect?id=".$id);
					//$this->success('新增成功', '/index.php/login/perfect?id='.$id);
				}else
				{
					$this->error('注册失败');exit;
				}
			}
		}
		$this->display('register');
	}

	function perfect()
	{
		$id = I('get.id',0);
		$city = $this->City->getByid(0);
		$this->assign('start',1960);
		$this->assign('id',$id);
		$this->assign('end',date('Y')+1);
		$this->assign('city',$city);
		$this->assign('dateY',$dataY);
		$this->display('perfect');
	}
	function upload()
	{
		$data['id'] = I('get.id');
		$city = I('post.city',0);
		$data['city_id'] = $city == 0 ? I('post.prov') : I('post.city');
		$day = intval(I('post.birthd'))>9 ? I('post.birthd') : '0'.I('post.birthd');
		$data['birthday'] = I('post.birthy').'-'.I('post.birthm').'-'.$day;
		$data['email'] = I('post.email');
		$data['say_hello'] = I('post.say_hello');
		$data['posttime'] = date('Y-m-d H:i:s',time());
		$data['ip'] = IP;
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  'Uploads/headpic/'.date('Ymd').'/';// 设置附件上传目录
		
		$uplad->saveRule = 'filename';
		if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			$data['top_url'] = '/'.$info[0]['savepath'].$info[0]['savename'];
			$res = $this->User->edit($data['id'],$data);
			if($res){
				$result = $this->User->getOne('id='.$data['id']);
				if($result){
					session('userid',$result['id']);
					session('username',$result['username']);
					header("Location:/index.php");
				}
			}else{
				$this->error('操作失败');exit;
			}

		}
	}
}
?>