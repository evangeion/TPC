<?php
namespace app\reslog\controller;

use think\Controller;
//use app\index\model\User;

class Index extends Controller
{
	public function reslog()
	{
		return $this->fetch();
	}
}