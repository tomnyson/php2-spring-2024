<?php


define('BASE_PATH', realpath(dirname(__FILE__) . '/..'));
require_once '../app/autoloader.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$url = $_GET['url'] ?? 'home/index';

if ($url == "") {
    $url = 'home/index';
}

$urlParts = explode('/', $url);
$controllerName = "Controllers\\" . ucfirst($urlParts[0]) . 'Controller';
$action = $urlParts[1] ?? 'index';
$controller = new $controllerName();
$controller->$action();
