<?php
namespace app\Controller;


use app\Model\linksModel;
use app\Model\linksSortModel;
use app\Model\systemModel;
use core\lib\session;

class submerController extends adminBaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $model = new linksSortModel();
        $sort = $model->all();
        $this->display('admin.index',[
            'sort' => $sort
        ]);
    }

    /**
     * 链接视图
     */
    public function links()
    {
        $id = $this->request()->get('sort');
        if ($id) {
            $model = new linksModel();
            $result = $model->find('sort_id',$id,['source','desc']);
            $this->display('admin.link',[
                'list' => $result,
                'sortid' => $id
            ]);
        }else{
            jump('/submer/index');
        }

    }

    /**
     * 添加链接视图
     */
    public function links_add()
    {
        $sortid = $this->request()->get('sortid');
        $id = $this->request()->get('id');
        if ($sortid > 0) {
            $model = new linksSortModel();
            $result = $model->findById($sortid);
            if (!$result) {
                p('没有这个分类');
                exit();
            }
            $linkModel = new linksModel();
            $data = $linkModel->find('id',$id);
            $this->display('admin.linksadd',[
                'sort' => $result,
                'data' => $data[0]
            ]);
        }else{
            p('请选择分类');
            exit();
        }
    }

    /**
     * 链接分类视图
     */
    public function links_sort()
    {
        $model = new linksSortModel();
        $list = $model->all();
        $this->display('admin.linksort',[
            'list' => $list
        ]);
    }

    /**
     * 添加分类视图
     */
    public function link_sort_add()
    {
        $id = $this->request()->get('id');
        $data = [];
        if ($id > 0) {
            $model = new linksSortModel();
            $data = $model->findById($id);
        }
        $this->display('admin.linksortadd',[
            'data' => $data
        ]);
    }

    /**
     * 后台首页
     */
    public function welcome()
    {
        $this->display('admin.welcome');
    }

    /**
     * 系统设置
     */
    public function system()
    {
        $model = new systemModel();
        $data = $model->get();
        $this->display('admin.system',[
            'data' => $data
        ]);
    }

    /**
     * 退出
     */
    public function logout()
    {
        $session = new session();
        $session->destroy();
        jump('/index/adminLoginPage');
    }

}