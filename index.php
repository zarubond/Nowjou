<?php
session_start();
define('EXEC',true);

require 'conf/settings.php';
require 'lib/controller.php';
require 'lib/model.php';
require 'lib/router.php';
require 'lib/helper.php';

$router=new Router();
$router->run($_SERVER['REQUEST_URI']);

?>