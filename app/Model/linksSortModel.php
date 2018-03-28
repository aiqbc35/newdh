<?php

namespace app\Model;


use core\lib\model;

class linksSortModel extends model
{
    private static $table = 'sort';

    /**
     * 获取所有数据
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->db->table(self::$table)->orderBy('sorting','asc')->get();
    }

    /**
     * 根据条件获取
     * @param $key
     * @param $value
     * @return bool|\Illuminate\Support\Collection|mixed
     */
    public function get($key,$value)
    {
        if (empty($key)) {
            return false;
        }
        $result = $this->db->table(self::$table)
            ->where($key,'=',$value)
            ->get();
        if (count($result) == 1) {
            return $result[0];
        }else{
            return $result;
        }
    }

    /**
     * 根据ID查询
     * @param $id
     * @return bool|\Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function findById($id)
    {
        if (empty($id)) {
            return false;
        }
        return $this->db->table(self::$table)->where('id','=',$id)->first();
    }

    /**
     * 保存
     * @param $where []
     * @param $data []
     * @return bool|int
     */
    public function save($where,$data)
    {
        if (empty($where) || $data == '') {
            return false;
        }
        $key = array_keys($where);
        $value = array_values($where);
        return $this->db->table(self::$table)->where($key[0],$value[0])->update($data);

    }

    /**
     * 删除单个文件
     * @param $where
     * @return bool|int
     */
    public function del($where)
    {
        if (empty($where)) {
            return false;
        }
        $key = array_keys($where);
        $value = array_values($where);

        return $this->db->table(self::$table)->where($key[0],$value[0])->delete();

    }

    /**
     * 批量删除
     * @param $key 索引
     * @param $value 值 []
     * @return bool|int
     */
    public function delAll($key,$value)
    {
        if (empty($key) || $value == '') {
            return false;
        }

        if (!is_array($value) || count($value) < 1) {
            return false;
        }

        return $this->db->table(self::$table)->whereIn($key,$value)->delete();

    }

    /**
     * 新增
     * @param $data []
     * @return bool
     */
    public function add($data)
    {
        if (empty($data)) {
            return false;
        }
        return $this->db->table(self::$table)->insert($data);
    }
}