<?php
namespace app\Model;

use core\lib\model;

class adminModel extends model
{

	private $table = 'admin';

	public function all()
	{
		$users = $this->db->table($this->table)->get();
		return $users;
	}

    /**
     * 用户登录
     * @param $where
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function getLogin($where)
    {
        $result = $this->db->table($this->table)->where('username','=',$where['username'])
            ->where('passwd','=',md5($where['passwd']))->first();
        return $result;
    }


}