<?php
namespace app\Controller;

use core\core;
use core\lib\session;

class adminBaseController extends core
{
    public function __construct()
    {
        $sessionModel = new session();

        if (!$sessionModel->has('username') || $sessionModel->get('username') == '') {
            jump('/index/adminLoginPage');
            exit();
        }

    }
}