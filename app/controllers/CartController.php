<?php

namespace Controllers;

use Exception;
use Models\CartModel;
use Models\ProductModel;
use Helper\Helper;

class CartController
{
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            Helper::redirectLink("/user/login?callback={$_SERVER['HTTP_REFERER']}");
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }
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

    public function add()
    {

        try {
            $id =  (int)$_GET['id'];
            $userId = (int)$_SESSION['user_id'];
            // get info detail of product
            // check case exist or not exist in cart
            // if not exist insert or update quantity
            // check exist product in cart

            $productModel = new ProductModel();
            $product = $productModel->getProductById((int)$id);

            if (!$product) {
                throw new Exception("Product not found.");
            }

            // check exist product in cart
            $cartModel = new CartModel();

            $cart = $cartModel->getCartItem($userId, $id);

            if ($cart) {
                //case exist
                $quantity = $cart[0]['quantity'] + 1;

                $data = array(
                    'productId' => (int)($product[0]['id']),
                    'userId' => (int)$_SESSION['user_id'],
                    'quantity' => $quantity
                );
                $cart = $cartModel->update($data, array(
                    'id' => $cart[0]['id'],
                ));
            } else {
                // case not exist
                $data = array(
                    'productId' => (int)($product[0]['id']),
                    'userId' => (int)$_SESSION['user_id'],
                    'quantity' => 1
                );

                $cart = $cartModel->insert($data);
            }
            header('Location:' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function renderCartMenu()
    {
        $cartModel = new CartModel();
        $userId = (int)$_SESSION['user_id'];
        $cart = $cartModel->getCartByUserId($userId);
        var_dump($cart);
        $totalPrice = 0;
        $itemsHtml = '';

        foreach ($cart as $item) {
            // $totalPrice += $item['price'] * $item['quantity'];
            $itemsHtml .= <<<ITEM
            <div class="single-cart-item">
                <div class="cart-img">
                    <a href="cart.html"><img src="{$item['image']}" alt=""></a>
                </div>
                <div class="cart-text">
                    <h5 class="title"><a href="cart.html">{$item['name']}</a></h5>
                    <div class="cart-text-btn">
                        <div class="cart-qty">
                            <span>{$item['quantity']}×</span>
                            <span class="cart-price">\${$item['price']}</span>
                        </div>
                        <button type="button"><i class="ion-trash-b"></i></button>
                    </div>
                </div>
            </div>
    ITEM;
        }

        echo <<<EOT
        <li class="minicart-wrap">
            <a href="#" class="minicart-btn toolbar-btn">
                <i class="ion-bag"></i>
                <span class="cart-item_count">{$totalPrice}</span>
            </a>
            <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
                $itemsHtml
                <div class="cart-price-total d-flex justify-content-between">
                    <h5>Total :</h5>
                    <h5>\$$totalPrice</h5>
                </div>
                <div class="cart-links d-flex justify-content-center">
                    <a class="obrien-button white-btn" href="cart.html">View cart</a>
                    <a class="obrien-button white-btn" href="checkout.html">Checkout</a>
                </div>
            </div>
        </li>
        EOT;
    }
}
