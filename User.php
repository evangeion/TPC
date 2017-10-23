<?php
namespace app\reslog\model;

use think\Model;
use \think\Validate;
use think\Db;

class User extends Model
{
	//用户注册
	public function yonghuZhuce()
	{
		
		if(!empty($_POST))
		{
			//dump($_POST);
			$data = [
						'name' => $_POST['name'],
						'phone' => $_POST['phone'],
						'password' => md5($_POST['password']),
						'xingming' => $_POST['xingming'],
						'cardid' => $_POST['cardid'],
						'createtime' => time(),
					];
			Db::name('user')
			->insert($data);
		}
	} 

}