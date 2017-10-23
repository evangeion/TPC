<?php
namespace app\order\model;
use think\Model;

class UserAppend extends Model
{
	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}
}