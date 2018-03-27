<?php

namespace app\Model;


use core\lib\model;

class systemModel extends model
{
    private static $table = 'system';

    public function get()
    {
        $result = $this->db->table(self::$table)
            ->first();
        return $result;
    }

    /**
     * 修改数据
     * @param $data
     * @return bool|int
     */
    public function save($data)
    {
        if (empty($data)) {
            return false;
        }

        return $this->db->table(self::$table)
            ->where('id','1')
            ->update($data);
    }

}