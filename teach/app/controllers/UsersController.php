<?php

namespace Controllers;

use Models\UserModel;

class UsersController
{
    public function index()
    {
        $model = new UserModel();
        $users = $model->getUsers();
        // print($users);
        // app/views/users/index.php
        print_r("call here" . BASE_PATH);
        require_once BASE_PATH . '\app\views\users\index.php';
    }
}
