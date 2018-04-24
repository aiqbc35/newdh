<?php

namespace app\Controller;


use app\Model\linksModel;
use app\Model\linkSourceModel;
use app\Model\linksSortModel;
use app\Model\subscribeModel;
use app\Model\systemModel;
use core\core;
use core\lib\session;

class ApiController extends core
{
    /**
     * 申请收录
     */
    public function signin()
    {
        if ($this->request()->isMethod('post')) {

            $session = new session();

            $newtime = time();

            if ($session->has('signtime')) {

                $stoptime = 30;

                $time = $session->get('signtime');

                $settime = $newtime - $time;

                if ( $settime < $stoptime) {
                    $showtime = round(($stoptime - $settime) / 60);
                    return response('error','请勿频繁请求！请于'. ($showtime ? $showtime : 1) .'分钟后再提交！');
                }

            }

            $request = $this->request();
            $name = $request->get('name');
            $url = $request->get('url');
            $email = $request->get('email');
            $sort = $request->get('sort');

            if ($name == '') {
                return response('error','网站名称不能为空');
            }
            if ($url == '') {
                return response('error','网站链接不能为空');
            }

            if (!filter_var($url,FILTER_VALIDATE_URL)) {
                return response('error','请输入合法的网址');
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                return response('error','请输入合法的邮箱');
            }

            $model = new linksModel();

            $isTitle = $model->findLike('title',$name);

            if (isset($isTitle[0]) && $isTitle[0] != '') {
                return response('error','网站名称已存在！');
            }

            $isLink = $model->findLike('link',$url);

            if (isset($isLink[0]) && $isLink[0] != '') {
                return response('error','网站链接已存在！');
            }

            $sortModel = new linksSortModel();
            $isSort = $sortModel->findById($sort);

            if (!$isSort) {
                return response('error','没有这个分类');
            }

            $data = [
                'title' => $name,
                'link' => $url,
                'email' => $email,
                'sort_id' => $sort,
                'status' => 1,
                'addtime' => $newtime
            ];


            $result = $model->add($data);

            if ($result) {
                $session->set('signtime',$newtime);
                return response('success','提交成功，请记住管理员邮箱，它是修改您网站信息的唯一凭证！');
            }else{
                return response('error','提交失败，请5分钟后尝试重试!');
            }

        }
    }

    /**
     * 邮件订阅
     */
    public function subscribe()
    {
        if ($this->request()->isMethod('post')) {

            $session = new session();

            $newtime = time();

            if ($session->has('subcrtime')) {

                $stoptime = 60;

                $time = $session->get('subcrtime');

                $settime = $newtime - $time;

                if ( $settime < $stoptime) {
                    $showtime = round(($stoptime - $settime) / 60);
                    return response('error','请勿频繁请求！请于'.  ($showtime ? $showtime : 1) .'分钟后再提交！');
                }

            }

            $email = $this->request()->get('email');
            if (empty($email)) {
                return response('error','邮箱不能为空');
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                return response('error','请输入合法的邮箱');
            }
            $model = new subscribeModel();

            $isEmail = $model->findEmail($email);

            if ($isEmail) {
                return response('error','该邮箱已订阅，请勿重复操作');
            }

            $data = [
                'email' => $email,
                'addtime' => $newtime,
                'addip' => get_ip()
            ];

            $result = $model->add($data);
            if ($result) {
                $session->set('subcrtime',$newtime);
                return response('success','订阅成功！');
            }else{
                return response('error','订阅失败，请稍后尝试！');
            }

        }
    }

    /**
     * 验证管理邮箱
     */
    public function isEmailUrl()
    {
        if ($this->request()->isMethod('post')) {

            $session = new session();

            $newtime = time();

            if ($session->has('isupdatetime')) {

                $stoptime = 30;

                $time = $session->get('isupdatetime');

                $settime = $newtime - $time;

                if ( $settime < $stoptime) {
                    $showtime = round(($stoptime - $settime) / 60);
                    return response('error','请勿频繁请求！请于'.  ($showtime ? $showtime : 1) .'分钟后再提交！');
                }

            }

            $email = $this->request()->get('email');

            if (empty($email)) {
                return response('error','邮箱不能为空');
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                return response('error','请输入合法的邮箱');
            }
            $model = new linksModel();
            $result = $model->find('email',$email);
            if (count($result) < 1) {
                return response('error','没有对应的管理邮箱！');
            }

            $data = array_map(function($value){

                            $data = [
                'name' => $value['title'],
                'id' => $value['id'],
                'url' => $value['link'],
                'email' => $value['email'],
                'sort' => $value['sort_id']
            ];
                return $data;
            },json_decode($result,true));

            $session->set('isupdatetime',$newtime);
            $session->set('linksupdate',$result[0]->email);

            return response('success','',$data);

        }
    }

    /**
     * 获取网站信息
     */
    public function getUpdateUrlOne()
    {
        if ($this->request()->isMethod('post')) {
           $id = $this->request()->get('id');
            if (empty($id)) {
                return response('error','请选择需要编辑的网站');
            }
            $session = new session();
            if (!$session->has('linksupdate')) {
                return response('error','您已退出，请重新输入管理邮箱','',404);
            }
            $model = new linksModel();
            $result = $model->findById($id);

            if (!$result) {
                return response('error','网站不存在','',404);
            }
            $data = [
                'name' => $result->title,
                'url' => $result->link,
                'email' => $result->email,
                'sort' => $result->sort_id
            ];
            $session->set('updateUrlInfo',(array) $result);
            return response('success','',$data);
        }
    }

    /**
     * 前端删除链接
     */
    public function deleteLink()
    {
        if ($this->request()->isMethod('post')) {

            $id = $this->request()->get('id');
            if (empty($id)) {
                return response('error','请选择网站');
            }
            $session = new session();
            if (!$session->has('linksupdate')) {
                return response('error','您已退出，请重新输入管理邮箱','',404);
            }
            $model = new linksModel();
            $result = $model->findById($id);

            if (!$result) {
                return response('error','网站不存在','',404);
            }

            $ret = $model->del('id',$id);

            if ($ret) {
                return response('success','删除成功');
            }else{
                return response('error','删除失败');
            }

        }
    }

    /**
     * 自助更新网站信息
     */
    public function updateUrl ()
    {
        if ($this->request()->isMethod('post')) {

            $session = new session();

            if (!$session->has('linksupdate')) {
                return response('error','请刷新后重试！','',404);
            }
            if (!$session->has('updateUrlInfo')) {
                return response('error','请刷新后重试！','',404);
            }
            $sessionC = $session->get('updateUrlInfo');

            $request = $this->request();
            $name = $request->get('name');
            $url = $request->get('url');
            $email = $request->get('email');
            $sort = $request->get('sort');

            if ($name == '') {
                return response('error','网站名称不能为空');
            }
            if ($url == '') {
                return response('error','网站链接不能为空');
            }

            if (!filter_var($url,FILTER_VALIDATE_URL)) {
                return response('error','请输入合法的网址,如：http://xxx.com;http://www.xxx.com');
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                return response('error','请输入合法的邮箱');
            }
            $sortModel = new linksSortModel();
            $isSort = $sortModel->findById($sort);

            if (!$isSort) {
                return response('error','没有这个分类');
            }
            $model = new linksModel();

            $isTitle = $model->findLike('title',$name);

            if (isset($isTitle[0]) && $isTitle[0]->id != $sessionC['id']) {
                 return response('error','名称已存在，请检查您的网站名');
            }

            $isLink = $model->findLike('link',$url);
            if (isset($isLink[0]) && $isLink[0]->id != $sessionC['id']) {
                return response('error','链接已存在，请检查您的网站域名');
            }

            $data = [
                'title' => $name,
                'link' => $url,
                'email' => $email,
                'sort_id' => $sort,
                'addtime' => time()
            ];

            $result = $model->save(['id'=>$sessionC['id']],$data);

            if ($result) {
                $session->del('linksupdate');
                return response('success','修改成功');
            }else{
                return response('error','提交失败，请稍后尝试！');
            }

        }
    }

    /**
     * 如果有来源并且来源存在于数据库中则增加来源
     * @param $url
     * @return bool
     */
    public function getSource()
    {

        if ($this->request()->isMethod('post')) {

            $url = $this->request()->get('url');

            $newurl = $this->pregUrl($url);
            if (!$newurl) {
                return false;
            }
            $model = new linksModel();
            $result = $model->findLike('link',$newurl);

            if (!isset($result[0])) {
                return false;
            }

            $sourceModel = new linkSourceModel();
            $ip = get_ip();
            $date = date('Y-m-d',time());

            $isDate = $sourceModel->dateFindLinkToIp($newurl,$date,$ip);

            if (count($isDate) >= 1) {
                return false;
            }

            $data = [
                'link' => $newurl,
                'ip' => $ip,
                'addtime' => $date,
                'links_id' => $result[0]->id
            ];

            $sourceModel->add($data);

            if ($result[0]->source == 0 && $result[0]->status == 1) {
                $id = $result[0]->id;
                $where = array('id' => $id);
                $model->save($where,['status' => 0]);
                $this->createHtml();
            }

        }

    }

    /**
     * 正则截取网址 xxx.com
     * @param $url
     * @return bool|mixed|string
     */
    private function pregUrl($url)
    {
        if (empty($url)) {
            return false;
        }
        $reg = '/^(http:\/\/)?([^\/]+)/i';
        $matches = array();
        preg_match($reg, $url, $matches);

        $surec = $matches[2];

        if (strpos($matches[2],'www.') !== false) {
            $urlArray = explode(".",$matches[2]);
            unset($urlArray[0]);
            $surec = implode(".",$urlArray);
        }
        return $surec;
    }

    /**
     * 凌晨还原来源
     */
    public function autoUpateDaySource()
    {

        $model = new linksModel();
        $model->saveAll(['source'=>0]);
    }

    /**
     * 自动执行更新没小时来源以及创建首页文件
     * @return bool
     */
    public function autoSoturce()
    {

        $date = date('Y-m-d',time());
        $status = 0;

        $model = new linkSourceModel();
        $sourceAll = $model->dateCountStatus($date,$status);
        if (count($sourceAll) < 1) {
            return false;
        }

        $linksId = array_column(json_decode($sourceAll,true),'links_id');

        $linkModel = new linksModel();
        $links = $linkModel->findWhereIn('id',$linksId);

        $newlinks = [];

        foreach ($links as $key=>$value){
            $newlinks[$key]['id'] = $value->id;
            foreach ($sourceAll as $v){
                if ($value->id == $v->links_id) {
                    $newlinks[$key]['source'] = $value->source + $v->total;
                }
            }
        }

        foreach ($newlinks as $vu){

            $linkModel->save(['id'=>$vu['id']],['source'=>$vu['source']]);
            $model->save('links_id',$vu['id'],['status'=>1]);
        }

        $this->createHtml();
    }

    /**
     * 创建首页文件
     * @return bool
     */
    private function createHtml()
    {

        $systemModel = new systemModel();

        $result = $systemModel->get();

        if ($result->weblink == '') {
            return false;
        }

        $indexUrl = $result->weblink . '/index/createindex';

        $index = file_get_contents($indexUrl);

        $result = file_put_contents(ROOT_PATH . 'index.html',$index);


    }



}