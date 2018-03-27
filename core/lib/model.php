<?php
namespace core\lib;

use core\lib\conf;
use Illuminate\Database\Capsule\Manager as Capsule;

class model
{
	protected $db;

	public function __construct()
	{
		$option = conf::all('database');

		$this->db = new Capsule;

		$this->db->addConnection(conf::all('database'));
		$this->db->setAsGlobal();
	}
}