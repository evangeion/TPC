<?php
namespace app\tpcsy\controller;

use think\Controller;
use \think\Validate;

class Index extends Controller
{
	protected $user;
	public function _initialize()
	{
		
	}
	public function index()
	{
		return $this->fetch();
	}
}