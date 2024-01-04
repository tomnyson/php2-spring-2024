<?php

namespace Controllers;

use Models\UserModel;

class UsersController
{
    public function index()
    {
        $model = new UserModel();
        $users = $model->getUsers();
        ob_start(); // start output buffering
        require_once BASE_PATH . '/app/views/users/index.php';
        $content = ob_get_clean();
        require_once BASE_PATH . '/app/views/master.php';
    }
}