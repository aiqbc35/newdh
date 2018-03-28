<?php
/**
 * 入口文件
 *1、定义常量
 *2、加载函数库
 *3、启动框架
 */
  
define('ROOT_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/"); //根目录
define('CORE',ROOT_PATH.'core');     //核心目录
define('APP',ROOT_PATH.'app');      //项目路径
define('THEME_ADMIN','/public/admin');   //静态文件
define('MODULE','app');      
define('DEBUG',true);   //是否开启调试模式,true开启,false关闭
define('SESSION_STATUS',true);


include ROOT_PATH."vendor/autoload.php";

if (DEBUG) {
	$whoops = new \Whoops\Run;
	$optionTitle = "框架出错了";
	$option = new \Whoops\Handler\PrettyPageHandler();
	$option->setPageTitle($optionTitle);
	$whoops->pushHandler($option);
	$whoops->register();
	ini_set('display_errors','on');
}else{
	ini_set('display_errors','off');
}

if (SESSION_STATUS) {
    session_start();
}

//函数库
include CORE.'/common/function.php';

include CORE.'/core.php';

spl_autoload_register('\core\core::load');

\core\core::run();
