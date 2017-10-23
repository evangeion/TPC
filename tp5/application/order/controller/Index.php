<?php
namespace app\order\controller;

use think\Controller;
use app\order\model\User as UserModel;
use \think\Validate;

class Index extends Controller
{
	protected $user;
	public function _initialize()
	{
		$this->user = new UserModel();
		// $result = json_decode(session('result'));
		// dump($result);
		$name = session('name');
		if($name) {
			$this->assign('name',$name);
			$this->assign('logined',1);
		}
		else {
			$this->assign('logined',0);
		}
	}
	public function out()
	{
		session('name',null);
		return 0;
	}
	public function index()
	{
		$result = json_decode(session('result'));
		$name = session('name');
		if($name) {
			$this->assign('name',$name);
			$this->assign('logined',1);
			$id = $result->id;
			$this->user->privilege();
			$privilege = $this->user->get($id)->privilege[0];
			$privilege = json_encode($privilege);
			$privilege = json_decode($privilege)->privilege;
			$this->assign('privilege',$privilege);
			$this->assign('phone',$result->phone);
			$pay = $result->pay;
			$this->assign('realpay',$pay);
			$this->assign('pay',round($pay/250));
			$this->user->userAppend();
			$userAppend = $this->user->get($id)->userAppend[0];
			$userAppend = json_encode($userAppend);
			$userAppend = json_decode($userAppend);
			$score = $userAppend->score;
			$shopping_spot = $userAppend->shopping_spot;
			$charm = $userAppend->charm;
			$this->assign('score',$score);
			$this->assign('shopping_spot',$shopping_spot);
			$this->assign('charm',$charm);
			// dump($userAppend);
		}
		return $this->fetch();
	}
	public function myprivilage()
	{
		$result = json_decode(session('result'));
		$name = session('name');
		if($name) {
			$this->assign('name',$name);
			$this->assign('logined',1);
			$id = $result->id;
			$this->user->privilege();
			$privilege = $this->user->get($id)->privilege[0];
			$privilege = json_encode($privilege);
			$privilege = json_decode($privilege)->privilege;
			$this->assign('privilege',$privilege);
		}
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
	public function actual_trade()
	{
		return $this->fetch();
	}
	public function myaddress()
	{
		return $this->fetch();
	}
	public function ticket()
	{
		return $this->fetch();
	}
	public function coupon()
	{
		return $this->fetch();
	}
	public function coin()
	{
		return $this->fetch();
	}
	public function message()
	{
		return $this->fetch();
	}
	public function attention()
	{
		return $this->fetch();
	}
	public function prop()
	{
		return $this->fetch();
	}
	public function charm()
	{
		return $this->fetch();
	}
	public function myticket()
	{
		return $this->fetch();
	}
}