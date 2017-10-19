<?php
namespace app\order\controller;

use think\Controller;

class Index extends Controller
{
	public function index()
	{
		return $this->fetch();
	}
	public function myprivilage()
	{
		return $this->fetch();
	}
	public function task()
	{
		return $this->fetch();
	}
	public function trade()
	{
		return $this->fetch();
	}
}