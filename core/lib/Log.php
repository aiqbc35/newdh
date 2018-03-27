<?php
namespace core\lib;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log
{

	/**
	 * [info 信息记录  Interesting events. Examples: User logs in, SQL logs.]
	 * @param  [type] $text [日志信息]
	 * @param  array  $data [要记录的数组]
	 * @return [type]       [description]
	 */
	public static function info($text,$data=array())
	{
		$obj = self::init();

		$obj['obj']->pushHandler(new StreamHandler($obj['file'], Logger::INFO));
		return $obj['obj']->info($text,empty($data) ? array() : $data);
	}
	/**
	 * [debug 调试信息 Detailed debug information.]
	 * @param  [type] $text [description]
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	public static function debug($text,$data=array())
	{
		$obj = self::init();

		$obj['obj']->pushHandler(new StreamHandler($obj['file'], Logger::DEBUG));
		return $obj['obj']->debug($text,empty($data) ? array() : $data);
	}
	/**
	 * [notice 注意 Normal but significant events]
	 * @param  [type] $text [description]
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	public static function notice($text,$data=array())
	{
		$obj = self::init();

		$obj['obj']->pushHandler(new StreamHandler($obj['file'], Logger::NOTICE));
		return $obj['obj']->notice($text,empty($data) ? array() : $data);
	}
	/**
	 * [warning 警告 Exceptional occurrences that are not errors. Examples: Use of deprecated APIs, poor use of an API, undesirable things that are not necessarily wrong.]
	 * @param  [type] $text [description]
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	public static function warning($text,$data=array())
	{
		$obj = self::init();

		$obj['obj']->pushHandler(new StreamHandler($obj['file'], Logger::WARNING));
		return $obj['obj']->warning($text,empty($data) ? array() : $data);
	}
	/**
	 * [error 错误 Runtime errors that do not require immediate action but should typically be logged and monitored.]
	 * @param  [type] $text [description]
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	public static function error($text,$data=array())
	{
		$obj = self::init();

		$obj['obj']->pushHandler(new StreamHandler($obj['file'], Logger::ERROR));
		return $obj['obj']->error($text,empty($data) ? array() : $data);
	}
	/**
	 * [critical 危急 Critical conditions. Example: Application component unavailable, unexpected exception.]
	 * @param  [type] $text [description]
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	public static function critical($text,$data=array())
	{
		$obj = self::init();

		$obj['obj']->pushHandler(new StreamHandler($obj['file'], Logger::CRITICAL));
		return $obj['obj']->critical($text,empty($data) ? array() : $data);
	}
	/**
	 * [alert 警报 Action must be taken immediately. Example: Entire website down, database unavailable, etc. This should trigger the SMS alerts and wake you up.]
	 * @param  [type] $text [description]
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	public static function alert($text,$data=array())
	{
		$obj = self::init();

		$obj['obj']->pushHandler(new StreamHandler($obj['file'], Logger::ALERT));
		return $obj['obj']->alert($text,empty($data) ? array() : $data);
	}
	/**
	 * [emergency 急 Emergency: system is unusable.]
	 * @param  [type] $text [description]
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	public static function emergency($text,$data=array())
	{
		$obj = self::init();

		$obj['obj']->pushHandler(new StreamHandler($obj['file'], Logger::EMERGENCY));
		return $obj['obj']->emergency($text,empty($data) ? array() : $data);
	}


	/**
	 * [init 初始化日志]
	 * @return [type] [description]
	 */
	private static function init()
	{
		$filePath = ROOT_PATH . 'store/log/' .date('Y-m-d');
		if (!is_dir($filePath)) {
			mkdir($filePath,0777,true);
		}
		$logObject = new Logger('Rookie-Framework');
		$file =  $filePath . '/log_' . date('H') . '.log';

		return [
			'obj' => $logObject,
			'file' => $file
		];
	}

}