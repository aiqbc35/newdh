<?php
namespace core\lib;

class conf
{
	public static $conf = array();

	/**
	 * [get 获取单个配置文件]
	 * @param  [type] $name [配置项]
	 * @param  [type] $file [配置文件]
	 * @return [type]       [description]
	 */
	public static function get($name,$file)
	{
		if (isset(self::$conf[$file])) {
			return self::$conf[$file][$name];
		}else{
			$path = CORE . '/config/' . $file . '.php';
			if (is_file($path)) {
				$conf = include $path;
				if (isset($conf[$name])) {
					self::$conf[$file] = $conf;
					return $conf[$name];
				}else{
					throw new Exception("没有这个配置项", 1);
				}
			}else{
				throw new Exception("找不到配置文件" . $file, 1);			
			}
		}
	}
	/**
	 * [all 获取所有配置项]
	 * @param  [type] $file [配置项文件名称]
	 * @return [type]       [description]
	 */
	public static function all($file)
	{
		if (isset(self::$conf[$file])) {
			return self::$conf[$file];
		}else{
			$path = CORE . '/config/' . $file . '.php';
			if (is_file($path)) {
				$conf = include $path;
				self::$conf[$file] = $conf;
				return $conf;
			}else{
				throw new Exception("找不到配置文件" . $file, 1);			
			}
		}
	}

}