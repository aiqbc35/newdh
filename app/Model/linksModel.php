<?php
/**
 * Created by PhpStorm.
 * User: rookie
 * Url : PTP6.Com
 * Date: 2018/3/25
 * Time: 17:20
 */

namespace app\Model;


use core\lib\model;

class linksModel extends model
{
    private static $table = 'links';

    /**
     * 查询
     * @param $key
     * @param $value
     * @param string $fields 指定索引
     * @return bool|\Illuminate\Support\Collection
     */
    public function find($key,$value,$order = ['id','asc'])
    {
        if (empty($key) || $value == '') {
            return false;
        }

        return $this->db->table(self::$table)
            ->where($key,'=',$value)
            ->orderBy($order[0],$order[1])
            ->get();

    }

    /**
     * 修改
     * @param $where
     * @param $data
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
     * 查询所有
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        $result = $this->db->table(self::$table)->where('status','=',0)
            ->leftJoin('sort','links.sort_id','=','sort.id')
            ->where('status','=',0)
            ->orderBy('sort.sorting','asc')
            ->orderBy('source','asc')
            ->get(['sort.title as sorttitle',self::$table.'.title',self::$table.'.link','sort.code',self::$table.'.source',self::$table.'.sort_id']);
        return $result;
    }

    /**
     * 删除
     * @param $key 索引
     * @param $value  值
     * @return bool|int
     */
    public function del($key,$value)
    {
        if (empty($key) || $value == '') {
            return false;
        }
        return $this->db->table(self::$table)->where($key,$value)->delete();
    }

    /**
     * 批量删除
     * @param $where
     * @param $data
     * @return bool|int
     */
    public function delAll($where,$data)
    {
        if (empty($where) || $data == '') {
            return false;
        }

        return $this->db->table(self::$table)->whereIn($where,$data)->delete();
    }

    /**
     * 模糊查询
     * @param $key
     * @param $value
     * @return bool|\Illuminate\Support\Collection
     */
    public function findLike($key,$value)
    {
        if (empty($key) || $value == '') {
            return false;
        }

        return $this->db->table(self::$table)->where($key,'like','%'.$value.'%')->get();

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