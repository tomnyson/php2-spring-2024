<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('BASE_PATH', realpath(dirname(__FILE__) . '/..'));
require_once '../app/autoloader.php';
require __DIR__ . '../../vendor/autoload.php';
require_once '../app/Router.php';

// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
    // you want to allow, and if so:
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        // may also be using PUT, PATCH, HEAD etc
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

function getRootUrl()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'];

    // Assuming your application is inside a subdirectory, e.g., /php2-spring-2024
    $path = '/php2-spring-2024/teach'; // Replace with the subdirectory path

    return $protocol . $domainName . $path;
}

$rootUrl = getRootUrl();
define('ROOT_URL', $rootUrl);

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$router = new Router();

// Static route
$router->addRoute('home/index', ['HomeController', 'index']);
$router->addRoute('users/index', ['UsersController', 'index']);
$router->addRoute('crawl/index', ['CrawlController', 'index']);
$router->addRoute('crawl/car', ['CrawlController', 'getCar']);
$router->addRoute('car/list', ['CarController', 'list']);
$router->addRoute('car/categories', ['CarController', 'categories']);

// Dynamic routes
$router->addRoute('post/{id}', ['PostController', 'show']);
$router->addRoute('profile/{slug}', ['ProfileController', 'show']);

$url = $_GET['url'] ?? 'home/index';
$router->route($url);
