<?php
namespace app\reslog\controller;

use app\reslog\model\User as UserModel;

use think\Controller;
use \think\Validate;
class Register extends Controller
{

	protected $user;
	public function  _initialize()
	{
		$this->user = new UserModel;
	}
//==================================================
	public function register()
	{
	//判断用户名是否存在
		$name = $this->request->param('name');
		$result = $this->user->get(['name'=>$name]);
		if ($result){
			return json_encode(['code'=>1, 'register'=>'yijingcunzai']);
		}
		elseif($name&&empty($_POST)) 
		{
			return json_encode(['code'=>0, 'register'=>'keyizhuce']);	
		}
	//==================================================
		$re = $this->user->yonghuZhuce();
		return $this->fetch();
	}

	public function yzm()
	{
		//判断验证码是否正确
		//验证验证码
		$validate = new Validate([
			'captcha|验证码'=>'require|captcha'
			]);
		$data = [
		'captcha'=>input('yzm'),
		];
		if($validate->check($data))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
}


