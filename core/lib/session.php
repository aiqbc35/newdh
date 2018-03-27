<?php
namespace core\lib;

class session
{

    private static $name;

    public function __construct()
    {
        if (SESSION_STATUS !== true) {
            throw new \Exception('请启动SESSION');
        }
    }

    /**
     * 写入session
     * @param $name 索引
     * @param $data  内容
     * @param null $time  过期时间 单位：秒
     * @return bool|string 返回session_id
     */
    public function set($name,$data,$time = null)
    {
        if (empty($name)) {
            return false;
        }
        if (empty($data)) {
            return false;
        }

        $_SESSION[$name] = $data;

        if ($time != null) {
            if (is_numeric($time)) {
                $_SESSION[$name]['time'] = time() + $time;
            }
        }
        return session_id();
    }

    /**
     * 获取记录
     * @param $name 索引
     * @return bool 如果存在并没有过期则返回记录信息，反之返回false;
     */
    public function get($name)
    {
        $isHas = $this->has($name);
        if ($isHas === false) {
            return false;
        }

        $data = $_SESSION[$name];

        if (isset($_SESSION[$name]['time'])) {
            self::$name = $name;

            $result = $this->checkExpired();

            if ($result) {
                return $data;
            }
            return false;
        }

        return $data;
    }

    /**
     * 判断是否过期并删除记录
     * @return bool 过期返回false
     */
    private function checkExpired()
    {
        if ( time() >= $_SESSION[self::$name]['time'] ) {
            $this->del(self::$name);
            return false;
        }
        return true;
    }

    /**
     * 删除记录
     * @param $name
     */
    public function del($name)
    {
        unset($_SESSION[$name]);
    }

    /**
     * 检查session是否存在
     * @param $name  session索引
     * @return bool 存在true
     */
    public function has($name)
    {
        if (isset($_SESSION[$name])) {
            return true;
        }
        return false;
    }

    /**
     * 销毁session
     */
    public function destroy()
    {
        $_SESSION = array();
        session_destroy();
    }

}