<?php

session_start();
define('BASE_PATH', realpath(dirname(__FILE__) . '/..'));
require_once '../app/autoloader.php';
require_once BASE_PATH . '/app/database.php';
require_once BASE_PATH . '/app/DatabaseHelper.php';
require_once BASE_PATH . '/app/Router.php';
require BASE_PATH . '/vendor/autoload.php';
ini_set('display_errors', 1);
## load bien environment
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// var_dump($_ENV);

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
$router->addRoute('user/index', ['UserController', 'index']);
$router->addRoute('crawl/index', ['CrawlController', 'index']);
// user router
$router->addRoute('user/register', ['UserController', 'register']);
$router->addRoute('user/login', ['UserController', 'login']);
$router->addRoute('user/checklogin', ['UserController', 'checklogin']);
$router->addRoute('user/save', ['UserController', 'save']);
// Dynamic routes
$router->addRoute('product/{id}', ['ProductController', 'show']);
$router->addRoute('profile/{slug}', ['ProfileController', 'show']);

$url = $_GET['url'];
if ($url == "") {
    header('Location:' . ROOT_URL . '/home/index');
    exit;
}
$router->route($url);
