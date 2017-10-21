<?php

namespace app\reslog\model;
use think\Model;


class User extends Model
{
	public function loginFunc()
	{
		header("Location: http://www.guanwei.org");
	}
}
