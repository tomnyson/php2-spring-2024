<?php

namespace Controllers;

use Models\ProductModel;

class HomeController
{
    public function index()
    {
        ob_start();
        $productModel = new ProductModel();
        $product_bestseller = $productModel->getListProductLimit(8);
        require_once BASE_PATH . '/app/views/home/index.php';
        $title = "Home";
        $content = ob_get_clean();
        require_once BASE_PATH . '/app/views/masterLayout.php';
    }
}
