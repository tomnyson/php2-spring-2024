<?php

namespace Controllers;

use Models\UserModel as UserModel;
use Models\ProductModel;
use Helper\Helper;

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
    public function login()
    {


        ob_start();
        $productModel = new ProductModel();
        $product_bestseller = $productModel->getListProductLimit(8);
        require_once BASE_PATH . '/app/views/users/login.php';
        $title = "LOGIN";
        $content = ob_get_clean();
        require_once BASE_PATH . '/app/views/masterLayout.php';
    }
    public function checklogin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (count($this->validate($_POST)) > 0) {

                $errors = $this->validate($_POST);
                $_SESSION['message'] = $errors;
                Helper::redirectLink('/user/login');
            } else {
                // check email khong ton tai
                // module B
                $userModel = new UserModel();
                $user = $userModel->getUserByEmail($_POST['email']);
                if (!empty($user)) {

                    $verify = password_verify($_POST['password'], $user[0]['password']);
                    if ($verify) {
                        $_SESSION['auth'] = 1;
                        $_SESSION['user_id'] = $user[0]['id'];
                        $_SESSION['username'] = $user[0]['name'];
                        $callback = $_POST['callback'];
                        if ($callback != '') {
                            header('Location:' . $callback);
                            exit();
                        }
                        header('Location:' . ROOT_URL . '/home/index');
                    } else {
                        $_SESSION['message'] = array('error' => 'Sai mat khau');
                        header('Location:' . ROOT_URL . '/user/login');
                    }
                } else {
                    $_SESSION['message'] = array('error' => 'email is exist');
                    header('Location:' . ROOT_URL . '/user/login');
                }
            }
        }
        // require_once BASE_PATH . '/app/views/users/create.php';
    }

    public function detail()
    {
        echo "hello world";
    }

    public function validate($data)
    {
        $errors = [];
        if (isset($data['name']) && empty($data['name'])) {
            $errors['first_name'] = 'name not empty';
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
    public function validateLogin($data)
    {
        $errors = [];
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
                Helper::redirectLink("/user/register");
            } else {
                // check email khong ton tai
                $userModel = new UserModel();
                $user = $userModel->getUserByEmail($_POST['email']);
                // var_dump(!empty($user));
                // die();
                if (!empty($user)) {
                    $_SESSION['message'] = array('error' => 'email is exist');
                    Helper::redirectLink("/user/register");
                }
                $data = array(
                    'email' => $_POST['email'],
                    'name' => $_POST['name'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                );
                // create new user and send message
                $create = $userModel->create($data);
                var_dump($create);
                // send email => wellcome websitene
                $_SESSION['message'] = array('success' => 'create user successfully');

                $to = $_POST['email'];
                $from = "tabletkindfire@gmail.com";
                $subject = "đăng ký thành công";
                $content = "<h1>bạn đã đăng ký thành công mật khẩu là: " . $_POST['password'] . "</h1>";

                header('Location:' . ROOT_URL . '/user/register');
                exit();
            }
        }
        require_once BASE_PATH . '/app/views/users/create.php';
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
