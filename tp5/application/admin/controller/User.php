<?php

namespace app\admin\controller;
use app\common\controller\Backend;
use fast\Tree;

/**
 * 分类管理
 *
 * @icon fa fa-list
 * @remark 用于统一管理网站的所有分类,分类可进行无限级分类
 */
class User extends Backend
{

    protected $model = null;
    protected $userlist = [];

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('User');
        $tree = Tree::instance();
        $tree->init($this->model->order('updatetime desc')->select(), 'deletetime');
        $this->userlist = $tree->getTreeList($tree->getTreeArray(null), 'name');
        foreach ($this->userlist as $k => $v)
        {
            $list[$v['id']] = $v;
        } 
        // dump(json_decode(json_encode($list)));  
        $list = $this->model->paginate(10);
        $this->view->assign("list", $list);
    }
}
