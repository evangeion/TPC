<?php
namespace app\homepage\controller;

use think\Controller;
use \think\Validate;

class Index extends Controller
{
	public function _initialize()
	{
		// $this->user = new UserModel;
	}
 
	public function index()
	{
		return $this->fetch();
	}
}