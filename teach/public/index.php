<?php
define('BASE_PATH', realpath(dirname(__FILE__) . '/..'));
require_once '../app/autoloader.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Here you can instantiate and use your classes
// For example, if you have a HomeController in the app\controllers namespace:
$url = $_GET['url'] ?? 'users/index';
$urlParts = explode('/', $url);
$controllerName = "Controllers\\" . ucfirst($urlParts[0]) . 'Controller';
$action = $urlParts[1] ?? 'index';

$controller = new $controllerName();
$controller->$action();
