<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $fullPath = __DIR__ .  DIRECTORY_SEPARATOR . $className . '.php';
    if (file_exists($fullPath)) {
        require_once $fullPath;
    }
});
