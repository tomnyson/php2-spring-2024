<?php

namespace Controllers;

use Models\ProductModel;

class ProductController
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

    public function show($id)
    {
        ob_start();
        $productModel = new ProductModel();
        $detail = $productModel->getProductById((int)$id);
        require_once BASE_PATH . '/app/views/product/detail.php';
        $title = $detail[0]['name'];
        $content = ob_get_clean();
        require_once BASE_PATH . '/app/views/masterLayout.php';
    }
}
