<?php
function p($data)
{
	if (is_bool($data)) {
		var_dump($data);
	}else if(is_null($data)){
		var_dump($data);
	}else{
		echo "<div style='width:100%;background-color:#CD5C5C;color:black;font-size:18px;padding:10px 10px;'>".print_r($data,true)."<div>";
	}
}

/**
 * 对象转数组
 * @param $object
 * @return array
 */
function toArray($object)
{
    return json_decode($object,true);
}

/**
 * 跳转
 * @param $url
 */
function jump($url)
{
    header("location:".$url);
    exit();
}

/**
 * 获取用户端IP
 * @return array|false|string
 */
function get_ip($type = 0){
    $type       =  $type ? 1 : 0;
    static $ip  =   NULL;
    if ($ip !== NULL) return $ip[$type];
    if(isset($_SERVER['HTTP_X_REAL_IP'])){//nginx 代理模式下，获取客户端真实IP
        $ip=$_SERVER['HTTP_X_REAL_IP'];
    }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {//客户端的ip
        $ip     =   $_SERVER['HTTP_CLIENT_IP'];
    }elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {//浏览当前页面的用户计算机的网关
        $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $pos    =   array_search('unknown',$arr);
        if(false !== $pos) unset($arr[$pos]);
        $ip     =   trim($arr[0]);
    }elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip     =   $_SERVER['REMOTE_ADDR'];//浏览当前页面的用户计算机的ip地址
    }else{
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    // IP地址合法验证
    $long = sprintf("%u",ip2long($ip));
    $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
    return $ip[$type];
}

/**
 * 输出反馈信息
 * @param $status  状态
 * @param string $message  信息
 * @param $data   反馈内容
 * @param int $code  状态码
 */
function response($status,$message = '',$data = null,$code=0)
{
    header('Content-type: application/json');
    $data = [
        'status' => $status,
        'msg' => $message,
        'code' => $code,
        'data' => $data
    ];
    echo jsonCode($data);
}

/**
 * 输出JSON格式
 * JSON_UNESCAPED_UNICODE 解决中文乱码的问题
 * @param $data
 */
function jsonCode($data)
{
    return json_encode($data,JSON_UNESCAPED_UNICODE);
}