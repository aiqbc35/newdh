<?php
namespace app\Controller;

use app\Model\adminModel;
use app\Model\linksModel;
use app\Model\linksSortModel;
use app\Model\systemModel;
use core\lib\session;

class indexController extends \core\core
{


	public function createindex()
	{
        $sortModel = new linksSortModel();
        $sort = $sortModel->all();

        $linksModel = new linksModel();
        $data = $linksModel->all();

        $dataForm = $this->dataFrom($data);

        $system = $this->cacheSystem();
		$this->display('index.index',[
		    'sort' => $sort,
            'data' => $dataForm,
            'system' => $system
        ]);
	}

    /**
     * 申请收录
     */
	public function signIn()
    {
        $sortModel = new linksSortModel();
        $sort = $sortModel->get('type',0);
        $system = $this->cacheSystem();
        $this->display('index.signin',[
            'sort' => $sort,
            'system' => $system
        ]);
    }

    /**
     * 订阅
     */
    public function subscribe()
    {
        $sortModel = new linksSortModel();
        $sort = $sortModel->all();
        $system = $this->cacheSystem();
        $this->display('index.subscribe',[
            'sort' => $sort,
            'system' => $system
        ]);
    }

    public function updateUrl()
    {
        $sortModel = new linksSortModel();
        $sort = $sortModel->get('type',0);
        $system = $this->cacheSystem();
        $this->display('index.updateurl',[
            'sort' => $sort,
            'system' => $system
        ]);
    }

    /**
     * 获取系统设置
     * @return array|bool
     */
    private function cacheSystem()
    {
        $session = new session();

        if ($session->has('system')) {
            return $session->get('system');
        }else{
            $model = new systemModel();
            $result = $model->get();
            $data = toArray($result);

            $session->set('system',$data);
            return $data;
        }
    }



    /**
     * 数据格式化
     * @param $data
     * @return array
     */
	private function dataFrom($data)
    {
        $newdata = array();

        foreach ($data as $key=>$value){
            $newdata[$value->sort_id]['sort'] = $value->sort_id;
            $newdata[$value->sort_id]['title'] = $value->sorttitle;
            $newdata[$value->sort_id]['code'] = $value->code;
            $newdata[$value->sort_id]['type'] = $value->type;
            $newdata[$value->sort_id]['data'][$key]['title'] = $value->title;
            $newdata[$value->sort_id]['data'][$key]['link'] = $value->link;
            $newdata[$value->sort_id]['data'][$key]['color'] = $value->color;
            $newdata[$value->sort_id]['data'][$key]['type'] = $value->sorttype;
        }
        return $newdata;
    }

    /**
     * 后台登陆页面
     */
	public function adminLoginPage()
    {

        $this->display('admin.login');
    }

    /**
     * 处理登陆
     * @return bool|void
     */
    public function pushLogin()
    {

        if ($this->request()->isMethod('post')) {

            $username = $this->request()->get('username');
            $passwd = $this->request()->get('passwd');

            if (empty($username)) {
                response('error','用户名不能为空');
                return;
            }
            if (empty($passwd)) {
                response('error','密码不能为空');
                return false;
            }
            $where['username'] = $username;
            $where['passwd'] = $passwd;

            $model = new adminModel();
            $result = $model->getLogin($where);

            if ($result) {
                $result = toArray($result);
               unset($result['passwd']);
                $session = new session();
                $session->set('username',$result);
                response('success','登录成功',['url'=>'/submer/index']);
                return true;
            }else{
                response('error','账号或密码错误');
                return false;
            }

        }

    }

}