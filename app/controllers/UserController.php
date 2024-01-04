<?php

namespace Controllers;

use Models\UserModel as UserModel;

class UserController
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->getAll();
        require_once BASE_PATH . '/app/views/users/index.php';
    }

    public function detail()
    {
        echo "hello world";
    }

    public function post()
    {
        echo "hello world";
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
