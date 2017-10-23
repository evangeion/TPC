<?php
namespace app\order\model;
use think\Model;

class Privilege extends Model
{
	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}
}