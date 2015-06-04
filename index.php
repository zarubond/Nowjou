<?php
session_start();
define('EXEC',true);

$data=Array();

require 'conf/settings.php';
require 'lib/controller.php';
require 'lib/manager.php';
require 'lib/router.php';
require 'lib/helper.php';
require 'lib/sql.php';
require 'lib/actinguser.php';

ActingUser::init();

SQL::connect();
$router=new Router();
$router->run($_SERVER['REQUEST_URI']);
SQL::disconnect();


?>