<?php
namespace app\reslog\controller;

use think\Controller;
use app\reslog\model\User as UserModel;
use \think\Validate;

class Login extends Controller
{
	protected $user;
	public function _initialize()
	{
		$this->user = new UserModel;
	}
    // 用户登录
	public function login()
	{
		$name = $this->request->param('name');
		$password = $this->request->param('password');
		$result = $this->user->get(['name'=>$name, 'password'=>md5($password)]);
		if($result) {
			session('name',$name);
			return json_encode(['code'=>1, 'info'=>'用户存在']);
		}
		elseif($name) {
			return json_encode(['code'=>0, 'info'=>'用户不存在']);
		}
		return $this->fetch();
	}
}