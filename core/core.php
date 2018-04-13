<?php
namespace core;

use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\HttpFoundation\Request;

class core
{
	public static $classMap = array();
	public $assign;


	/**
	 * [run 启动框架]
	 * @return [type] [description]
	 */
	public static function run()
	{
		$route = new \core\lib\route();

		$ctrlClass = $route->contrl;
		$action = $route->action;

		$contrlFile = APP . '/Controller/' . $ctrlClass . 'Controller.php';
		$contrlClass = '\\' . MODULE . '\Controller\\' . $ctrlClass . 'Controller';

		if (file_exists($contrlFile)) {
			include $contrlFile;
			$ctrl = new $contrlClass();
			if (strpos($action,'?') !==false) {
                $actionStr = explode('?',$action);
                $action = $actionStr[0];
            }
            if (!method_exists($ctrl,$action)) {
                jump('/404.html');
            }
			$ctrl->$action();
		}else{
            jump('/404.html');
		}
	}

    protected function request()
    {
        return Request::createFromGlobals();
    }
	/**
	 * [load 自动载入类]
	 * @param  [type] $class [description]
	 * @return [type]        [description]
	 */
	public static function load($class)
	{
		if (isset($classMap[$class])) {
			return true;
		}else{
			$class = str_replace('\\', '/', $class);
			$file = ROOT_PATH . '/' .$class . '.php';
			if (is_file($file)) {
				include $file;
				self::$classMap[$class] = $class;
			}else{
				return false;
			}
		}
	}


	public function assign($name,$value)
	{
		$this->assign[$name] = $value;
	}

	public function display($file,$data=array())
	{
			$cachePath = ROOT_PATH . 'store/theme';
			if (!is_dir($cachePath)) {
				mkdir($cachePath,0777,true);
			}
			$blade = new BladeInstance(APP . '/view',$cachePath);
			$blade = new BladeInstance(APP . '/view',$cachePath);
			echo $blade->render($file,$data);
	}

}