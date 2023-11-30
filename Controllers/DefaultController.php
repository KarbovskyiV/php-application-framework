<?php

namespace Controllers;

use Models\UserModel;

class DefaultController
{
    public function __construct()
    {
    }

    public function index(UserModel $model)
    {
        $users = $model->getAllUsers();

        print_r($users);
    }

    public function default(): void
    {
        echo 'Hi from DefaultController';
    }
}