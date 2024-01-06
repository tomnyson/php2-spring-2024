<?php

namespace Controllers;

class HomeController
{
    public function index()
    {
        ob_start();
        require_once BASE_PATH . '/app/views/home/index.php';
        $title = "Home";
        $content = ob_get_clean();
        require_once BASE_PATH . '/app/views/masterLayout.php';
    }
}
