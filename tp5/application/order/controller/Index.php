<?php
namespace app\order\controller;

use think\Controller;
use app\order\model\User as UserModel;
use app\order\model\Order;
use app\order\model\Ticket;
use \think\Validate;
use \think\Db;

class Index extends Controller
{
	protected $user;
	protected $order;
	protected $ticket;
	public function _initialize()
	{
		$this->order = new Order();
		$this->ticket = new Ticket();
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
		$this->assign('fu','个人中心');
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
		$this->assign('fu','我的特权');
		return $this->fetch();
	}
	public function task()
	{
		$this->assign('fu','我的任务');
		return $this->fetch();
	}
	public function trade()
	{
		$result = json_decode(session('result'));
		$name = session('name');
		$this->assign('fu','我的订单');
		return $this->fetch();
	}
	public function trade1()
	{
		$result = json_decode(session('result'));
		$name = session('name');
		if($name) {
			$id = $result->id;
			$appid = $this->request->param('appid');
			if($appid == '1001')
				$appid = '积分';
			elseif($appid == '1002')
				$appid = '购物点';
			else
				$appid = null;
			$where = [];
			if($appid)
			{
				$where['pay'] = $appid;
			}
			$where['user_id'] = $id;
			$value = $this->order->where($where)->select();
			return json_encode($value);
		}
	}
	public function actual_trade()
	{
		$this->assign('fu','我的周边订单');
		return $this->fetch();
	}
	public function myaddress()
	{
		$this->assign('fu','我的收货地址');
		return $this->fetch();
	}
	public function ticket()
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
			$this->user->userAppend();
			$userAppend = $this->user->get($id)->userAppend[0];
			$userAppend = json_encode($userAppend);
			$userAppend = json_decode($userAppend);
			$shopping_spot = $userAppend->shopping_spot;
			$this->assign('shopping_spot',$shopping_spot);
		}
		$this->assign('fu','我的购物点');
		return $this->fetch();
	}
	public function ticket1()
	{
		$result = json_decode(session('result'));
		$name = session('name');
		$id = $result->id;
		$appid = '购物点';
		$where = [];
		$where['pay'] = $appid;
		$where['user_id'] = $id;
		$value = $this->order->where($where)->select();
		return json_encode($value);
	}
	public function coupon()
	{
		$this->assign('fu','我的优惠券');
		return $this->fetch();
	}
	public function coupon1()
	{
		$result = json_decode(session('result'));
		$name = session('name');
		$id = $result->id;
		$where['user_id'] = $id;
		$value = $this->ticket->where($where)->select();
		return json_encode($value);
	}
	public function coin()
	{
		$result = json_decode(session('result'));
		$name = session('name');
		if($name) {
			$this->assign('name',$name);
			$id = $result->id;
			$this->user->userAppend();
			$userAppend = $this->user->get($id)->userAppend[0];
			$userAppend = json_encode($userAppend);
			$userAppend = json_decode($userAppend);
			$score = $userAppend->score;
			$shopping_spot = $userAppend->shopping_spot;
			$charm = $userAppend->charm;
			$this->assign('score',$score);
		}
		$this->assign('fu','我的积分');
		return $this->fetch();
	}
	public function coin1()
	{
		$result = json_decode(session('result'));
		$name = session('name');
		$id = $result->id;
		$appid = '积分';
		$where = [];
		$where['pay'] = $appid;
		$where['user_id'] = $id;
		$value = $this->order->where($where)->select();
		return json_encode($value);
	}
	public function message()
	{
		$this->assign('fu','我的消息');
		return $this->fetch();
	}
	public function attention()
	{
		$this->assign('fu','我的关注');
		return $this->fetch();
	}
	public function prop()
	{
		$this->assign('fu','我的功能性道具');
		return $this->fetch();
	}
	public function charm()
	{
		$this->assign('fu','领取魅力值');
		return $this->fetch();
	}
	public function myticket()
	{
		$this->assign('fu','我的票务');
		return $this->fetch();
	}
}