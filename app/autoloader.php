<?php
#  hàm này dùng để tự động load file vào khi khởi tao đối tượng
spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $fullPath = __DIR__ .  DIRECTORY_SEPARATOR . $className . '.php';
    if (file_exists($fullPath)) {
        require_once $fullPath;
    }
});
