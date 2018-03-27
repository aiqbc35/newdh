<?php

namespace app\Model;

use core\lib\model;

class subscribeModel extends model
{
    private static $table = 'subscribe';

    /**
     * 查找单个邮箱
     * @param $email
     * @return bool|\Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function findEmail($email){
        if (empty($email)) {
            return false;
        }
        return $this->db->table(self::$table)
            ->where('email','=',$email)
            ->first();
    }

    /**
     * 新增数据
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

}