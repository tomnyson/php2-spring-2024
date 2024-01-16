<?php

namespace Controllers;

use Models\UserModel as UserModel;
use Models\ProductModel;

class UserController
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->getAll();
        // header("Content-Type: application/json");
        // echo json_encode($users);
        require_once BASE_PATH . '/app/views/users/index.php';
    }

    public function register()
    {
        ob_start();
        $productModel = new ProductModel();
        $product_bestseller = $productModel->getListProductLimit(8);
        require_once BASE_PATH . '/app/views/users/register.php';
        $title = "Home";
        $content = ob_get_clean();
        require_once BASE_PATH . '/app/views/masterLayout.php';
    }

    public function detail()
    {
        echo "hello world";
    }

    public function validate($data)
    {
        $errors = [];
        if (isset($data['last_name']) && empty($data['last_name'])) {
            $errors['last_name'] = 'last_name not empty';
        }
        if (isset($data['first_name']) && empty($data['first_name'])) {
            $errors['first_name'] = 'first_name not empty';
        }
        if (isset($data['password'])) {
            if (empty($data['password'])) {
                $errors['password'] = 'password not empty';
            }
            if (strlen($data['password']) < 6) {
                $errors['password'] = 'password must be at least 6 characters';
            }
        }
        if (isset($data['email'])) {
            if (empty($data['email'])) {
                $errors['email'] = 'email not empty';
            }
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Invalid email format";
            }
        }
        return $errors;
    }
    public function create()
    {
        echo "create";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['name']) && isset($_POST['email'])) {
                echo "call action create";
                var_dump($_POST);
            }
        }
        require_once BASE_PATH . '/app/views/users/create.php';
    }

    public function save()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (count($this->validate($_POST)) > 0) {
                $errors = $this->validate($_POST);
                $_SESSION['message'] = $errors;
                header('Location:' . ROOT_URL . '/user/register');
                exit();
            }
        }
        // require_once BASE_PATH . '/app/views/users/create.php';
    }

    public function post()
    {
        if (isset($_POST['name']) && isset($_POST['email'])) {
            echo "call action create";
            var_dump($_POST);
        }
    }

    public function update()
    {
        echo "hello world";
    }

    public function delete()
    {
        echo "hello world";
    }
}
