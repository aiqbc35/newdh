<?php

namespace app\Controller;


use app\Model\linksModel;
use app\Model\linksSortModel;
use app\Model\systemModel;
use core\lib\session;

class submerApiController extends adminBaseController
{
    /**
     * 增加链接分类
     */
    public function addSort()
    {
        $resuest = $this->request();

        if ($resuest->isMethod('post')) {

           $title = $resuest->get('title');
           $code = $resuest->get('code');
           $sort = $resuest->get('sorting');
           $id = $resuest->get('id');
           $type = $resuest->get('type');



            if ($title == '') {
                return response('error','名称不能为空');
            }
            if ($code == '') {
                return response('error','简称不能为空');
            }
            $sort = empty($sort) ? 0 : $sort;

            $model = new linksSortModel();

            $data = [
                'title' => $title,
                'code' => $code,
                'sorting' => $sort,
                'type' => $type
            ];

            if ($id) {
                $result = $model->save(['id'=>$id],$data);
            }else{
                $result = $model->add($data);
            }


            if ($result) {
                if ($id) {
                    $msg = '修改成功';
                }else{
                    $msg = '增加成功';
                }
                return response('success',$msg);
            }else{
                return response('error','增加失败');
            }
        }
    }

    /**
     * 删除链接分类
     */
    public function delSort()
    {
        $request = $this->request();

        if ($request->isMethod('post')) {

            $id = $request->get('id');

            $model = new linksSortModel();

            $linkModel = new linksModel();

            if (is_array($id) && count($id) > 1) {

                $result = $model->delAll('id',$id);

                if ($result) {
                    $linkModel->delAll('sort_id',$id);
                    return response('success','删除成功');
                }else{
                    return response('success','删除失败');
                }

            }
            elseif ($id > 0) {

                $result = $model->findById($id);

                if (!$result) {
                    return response('error','没有这条记录');
                }

                $result = $model->del(['id'=>$id]);

                if ($result) {
                    $linkModel->del('sort_id',$id);
                    return response('success','删除成功');
                }else{
                    return response('error','删除失败');
                }

            }else{
                return response('error','请选择内容');
            }

        }
    }

    /**
     * 增加链接
     */
    public function linksAdd()
    {
        $request = $this->request();
        if ($request->isMethod('post')) {
            $title = $request->get('title');
            $link = $request->get('link');
            $email = $request->get('email');
            $type = $request->get('type');
            $status = $request->get('status');
            $id = $request->get('id');
            $sortid = $request->get('sortid');

            if (empty($title) || $link == '') {
                return response('error','标题或链接不能为空');
            }

            if (empty($sortid)) {
                return response('error','请选择分类');
            }

            $data = [
                'title' => $title,
                'link' => $link,
                'type' => $type,
                'status' => $status,
                'sort_id' => $sortid,
                'email' => $email,
                'addtime' => time()
            ];

            $model = new linksModel();

            $result = $model->find('title',$title);

            if (count($result) >= 1 && $result[0]->id != $id) {
                return response('error','网站名称已存在');
            }

            $result = $model->findLike('link',$link);

            if (count($result) >= 1 && $result[0]->id != $id) {
                return response('error','链接已存在');
            }

            if ($id > 0) {
                $ret = $model->save(['id'=>$id],$data);
            }else{
                $ret = $model->add($data);
            }

            if ($ret) {
                if ($id) {
                    $msg = '修改成功';
                }else{
                    $msg = '增加成功';
                }
                return response('success',$msg);
            }else{
                return response('error','增加失败');
            }
        }
    }

    /**
     * 删除链接
     */
    public function delLinks()
    {
        if ($this->request()->isMethod('post')) {

            $id = $this->request()->get('id');

            if (!empty($id)) {

               $model = new linksModel();

               if(count($id) > 1){
                    $result = $model->delAll('id',$id);
                    if ($result) {
                        return response('success','删除成功');
                    }else{
                        return response('error','删除失败');
                    }
               }else{
                   $result = $model->find('id',$id);
                   if (!$result[0]) {
                       return response('error','没有这条记录');
                   }
                   $result = $model->del('id',$id);

                   if ($result) {
                       return response('success','删除成功');
                   }else{
                       return response('error','删除失败');
                   }
               }

            }else{
                return response('error','请选择内容');
            }


        }
    }


    public function saveSystem()
    {
        if ($this->request()->isMethod('post')) {
            $request = $this->request();

            $website = $request->get('website');
            $weblink = $request->get('weblink');
            $email = $request->get('email');
            $notice = $request->get('notice');
            $count = $request->get('count');
            $newlink = $request->get('newlink');
            $keyword = $request->get('keyword');
            $descr = $request->get('descr');

            if (empty($website) || $weblink == '') {
                return response('error','网站名称或链接不能为空');
            }

            $data = [
                'website' => $website,
                'weblink' => $weblink,
                'notice' => $notice,
                'count' => $count,
                'newlink' => $newlink,
                'email' => $email,
                'keyword' => $keyword,
                'descr' => $descr
            ];

            $model = new systemModel();

            $result = $model->save($data);

            if ($result) {

                $session = new session();
                $session->del('system');

                return response('success','保存成功');
            }else{
                return response('error','保存失败');
            }

        }
    }

    public function createHtml()
    {
        $indexUrl = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['HTTP_HOST'] . '/index/createindex';
        $signUrl = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['HTTP_HOST'] . '/index/signIn';
        $subceUrl = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['HTTP_HOST'] . '/index/subscribe';
        $upadeUrl = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['HTTP_HOST'] . '/index/updateUrl';

        $index = $this->getHtml($indexUrl);
        if (empty($index)) {
            return response('error','获取首页资源错误');
        }
        $isIndex = $this->setHtml($index,'index.html');
        if (!$isIndex) {
            return response('error','写入首页出错！');
        }

        $sign = $this->getHtml($signUrl);
        if (empty($sign)) {
            return response('error','读取申请页面失败');
        }
        $isSign = $this->setHtml($sign,'sign.html');
        if (!$isSign) {
            return response('error','写入注册页面失败');
        }

        $subce = $this->getHtml($subceUrl);
        if (empty($subce)) {
            return response('error','读取订阅页面出错');
        }
        $isSubce = $this->setHtml($subce,'subscribe.html');

        if (!$isSubce) {
             return response('error','写入订阅页面出错');
        }

        $update = $this->getHtml($upadeUrl);
        if (empty($update)) {
            return response('error','读取更新页面失败');
        }
        $isUpdate = $this->setHtml($update,'updateurl.html');

        if (!$isUpdate) {
            return response('error','写入更新页面失败');
        }

        return response('success','更新成功！');

    }

    private function getHtml($url)
    {
        return file_get_contents($url);
    }

    private function setHtml($data,$filename){
        return file_put_contents(ROOT_PATH . $filename,$data);
    }

}