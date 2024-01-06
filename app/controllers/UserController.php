<?php

namespace Controllers;

use Models\UserModel as UserModel;

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

    public function detail()
    {
        echo "hello world";
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
