<?php

namespace app\admin\controller;

use app\common\controller\Backend;
// use app\common\model\User as UserModel;
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
    protected $noNeedRight = ['selectpage'];

    public function _initialize()
    {
        parent::_initialize();
        $this->request->filter(['strip_tags']);
        $this->model = model('User');

        $tree = Tree::instance();
        $tree->init($this->model->order('updatetime desc')->select(), 'deletetime');
        $this->userlist = $tree->getTreeList($tree->getTreeArray(null), 'name');
        // dump($this->userlist);
        // dump($tree->getTreeArray(0));
        // dump($tree);
        // $userdata = [0 => ['type' => 'all', 'name' => __('None')]];
        foreach ($this->userlist as $k => $v)
        {
            $userdata[$v['id']] = $v;
            // dump($v);
        } 
        // dump($userdata);
        // $this->view->assign("flagList", $this->model->getFlagList());
        // dump($this->model->getFlagList());
        // $this->view->assign("typeList", UserModel::getTypeList());
        $this->view->assign("parentList", $userdata);
        // echo json($userdata);
        json_encode($userdata);
    }

    /**
     * 查看
     */
    public function index()
    {
        if ($this->request->isAjax())
        {
            $search = $this->request->request("search");
            //构造父类select列表选项数据
            $list = [];
            if ($search)
            {
                foreach ($this->userlist as $k => $v)
                {
                    if (stripos($v['id'], $search) !== false || stripos($v['name'], $search) !== false)
                    {
                        $list[] = $v;
                    }
                }
            }
            else
            {
                $list = $this->userlist;
            }
            $total = count($list);
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }

    /**
     * Selectpage搜索
     * 
     * @internal
     */
    public function selectpage()
    {
        return parent::selectpage();
    }

}