<?php

namespace app\Model;

use core\lib\model;

class linkSourceModel extends model
{
    private static $table = 'links_source';


    /**
     * 更新
     * @param $key
     * @param $value
     * @param $data
     * @return bool|int
     */
    public function save($key,$value,$data)
    {
        if (empty($key) || $value == '' || $data == '') {
            return false;
        }
        return $this->db->table(self::$table)->where($key,$value)->update($data);
    }

    /**
     * 添加
     * @param $data
     * @return bool
     */
    public function add($data)
    {
        if (empty($data)) {
            return false;
        }

        return $this->db->table(self::$table)->insert($data);

    }

    /**
     * 根据时间以及状态查询
     * @param $date
     * @param $status
     * @return bool|\Illuminate\Support\Collection
     */
    public function dateCountStatus($date,$status)
    {
        if (empty($date) || $status === '') {
            return false;
        }
        return $this->db->table(self::$table)
            ->select($this->db::raw('count(id) as total, links_id'))
            ->where('addtime','=',$date)
            ->where('status','=',$status)
            ->groupBy('links_id')
            ->get();
    }

    /**
     * 根据时间 链接 以及IP 查询结果
     * @param $link
     * @param $data
     * @param $ip
     * @return bool|\Illuminate\Support\Collection|mixed
     */
    public function dateFindLinkToIp($link,$data,$ip)
    {
        if (empty($link) || $data == '' || $ip == '') {
            return false;
        }
        $result = $this->db->table(self::$table)
            ->where('link',$link)
            ->where('data',$data)
            ->where('ip',$ip)
            ->get();
        if (count($result) == 1) {
            return $result[0];
        }else{
            return $result;
        }
    }

    /**
     * 查找
     * @param $key
     * @param $value
     * @return bool|\Illuminate\Support\Collection|mixed
     */
    public function find($key,$value)
    {
        if (empty($key) || $value == '') {
            return false;
        }
        $result = $this->db->table(self::$table)->where($key,$value)->get();
        if (count($result) == 1) {
            return $result[0];
        }else{
            return $result;
        }
    }

}