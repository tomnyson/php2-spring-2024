<?php


define('BASE_PATH', realpath(dirname(__FILE__) . '/..'));
require_once '../app/autoloader.php';
require_once BASE_PATH . '/app/database.php';
require_once BASE_PATH . '/app/DatabaseHelper.php';
require_once BASE_PATH . '/app/Router.php';
require BASE_PATH . '/vendor/autoload.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

$url = $_GET['url'] ?? 'home/index';

if ($url == "") {
    $url = 'home/index';
}

function getRootUrl()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'];

    // Assuming your application is inside a subdirectory, e.g., /php2-spring-2024
    $path = '/php2-spring-2024'; // Replace with the subdirectory path

    return $protocol . $domainName . $path;
}

$rootUrl = getRootUrl();
define('ROOT_URL', $rootUrl);

$router = new Router();

// Static route
$router->addRoute('home/index', ['HomeController', 'index']);
$router->addRoute('users/index', ['UsersController', 'index']);
$router->addRoute('crawl/index', ['CrawlController', 'index']);

// Dynamic routes
$router->addRoute('post/{id}', ['PostController', 'show']);
$router->addRoute('profile/{slug}', ['ProfileController', 'show']);

$url = $_GET['url'] ?? 'home/index';
$router->route($url);
