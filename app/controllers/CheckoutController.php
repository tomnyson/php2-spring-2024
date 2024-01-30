<?php

namespace Controllers;

use Exception;
use Models\CartModel;
use Models\ProductModel;
use Models\UserModel;
use Helper\Helper;
use Models\OderModel;

class CheckoutController
{
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            $callUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
            Helper::redirectLink("/user/login?callback={$callUrl}");
        }


        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }
    public function index()
    {
        ob_start();
        $productModel = new CartModel();
        $userModel = new UserModel();
        $userId = (int)$_SESSION['user_id'];
        // detail user hien tai =>
        $user = $userModel->getUserByID($userId);
        var_dump($user);
        $carts = $productModel->getCartByUserId($userId);
        require_once BASE_PATH . '/app/views/checkout/index.php';
        $title = "cart";
        $content = ob_get_clean();
        require_once BASE_PATH . '/app/views/masterLayout.php';
    }

    public function save()
    {
        // detail user hien tai =>

        ob_start();
        var_dump($_POST);
        // checkout
        $cartModel = new CartModel();
        $totalMount = $cartModel->getToTalCartByUser((int)$_SESSION['user_id']);
        var_dump("total", $totalMount);
        $data = array(
            'address' => $_POST['address'],
            'sdt' => $_POST['phone'],
            "userId" => (int)$_SESSION['user_id'],
            "note" => $_POST['notes'] ?? "",
            "status" => 0,
            "createdAt" => date('Y-m-d H:i:s'),
            'totalAmount' => (float)$totalMount[0]['total']

        );

        $oderModel = new OderModel();
        // create new user and send message
        $create = $oderModel->create($data);
        require_once BASE_PATH . '/app/views/product/detail.php';
        $content = ob_get_clean();
        require_once BASE_PATH . '/app/views/masterLayout.php';
    }


    public function add()
    {

        try {
            $id =  (int)$_GET['id'];
            $userId = (int)$_SESSION['user_id'];
            /**
             *  b1: lấy chi tiết sản phẩm
             *  b2: kt sản phẩm có tồn tại trong giỏ hàng hay chưa? ()
             *  b3: trường hợp 1: chưa có -> thêm vào
             *      trường hợp 2: tăng số lượng lên => cập nhật 
             */

            $productModel = new ProductModel();
            $product = $productModel->getProductById((int)$id);
            // b1:
            if (!$product) {
                throw new Exception("Product not found.");
            }

            // b2: kt sản phẩm có tồn tại trong giỏ hàng hay chưa? productId, userId
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
                // trường hợp 1: chưa có -> thêm vào
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

    public function remove()
    {

        try {
            $id =  (int)$_GET['id'];
            $userId = (int)$_SESSION['user_id'];
            /**
             *  b1: lấy chi tiết sản phẩm
             *  b2: kt sản phẩm có tồn tại trong giỏ hàng hay chưa? ()
             *  b3: trường hợp 1: chưa có -> thêm vào
             *      trường hợp 2: tăng số lượng lên => cập nhật 
             */

            $productModel = new ProductModel();
            $product = $productModel->getProductById((int)$id);
            // b1:
            if (!$product) {
                throw new Exception("Product not found.");
            }

            // b2: kt sản phẩm có tồn tại trong giỏ hàng hay chưa? productId, userId
            $cartModel = new CartModel();

            $cart = $cartModel->getCartItem($userId, $id);
            if ($cart) {
                $cart = $cartModel->remove($cart[0]["id"]);
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
        $totalPrice = 0;
        $itemsHtml = '';
        $count = count($cart);
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
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
                            <span class="cart-price">{$item['price']}đ</span>
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
                <span class="cart-item_count">{$count}</span>
            </a>
            <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
                $itemsHtml
                <div class="cart-price-total d-flex justify-content-between">
                    <h5>Total :</h5>
                    <h5>{$totalPrice} đ</h5>
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
