<?php

namespace Controllers;

use Models\ProductModel;

class ProductController
{
    public function detail($id)
    {
        ob_start();
        $productModel = new ProductModel();
        $detail = $productModel->getProductById((int)($id));
        $product_bestseller = $productModel->getListProductLimit(8);
        require_once BASE_PATH . '/app/views/products/detail.php';
        $title = "Home";
        $content = ob_get_clean();
        require_once BASE_PATH . '/app/views/masterLayout.php';
    }
}
