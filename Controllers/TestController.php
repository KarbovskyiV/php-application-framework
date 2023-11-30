<?php

namespace Controllers;

use Models\UserModel;

class TestController
{
    public function default(): void
    {
        echo 'default method';
    }

    public function view(UserModel $model): void
    {
        $users = $model->getAllUsers();

        include './views/table_view.php';
    }

    public function add(UserModel $userModel): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $age = trim($_POST['age'] ?? '');
            $gender = $_POST['gender'] ?? '';

            $age = $age === '' ? null : (int)$age;

            if (empty($name) || !in_array($gender, ['male', 'female', 'they/them'])) {
                echo "Invalid data. Please fill in all required fields.";
                echo '<br><a href="javascript:history.back()">Back</a>';
                return;
            }

            if ($age !== null && (!is_numeric($age) || $age < 0 || $age > 122)) {
                echo "Invalid age. Please enter a valid age.";
                echo '<br><a href="javascript:history.back()">Back</a>';
                return;
            }

            $userModel->addUser($name, $age, $gender);
        }

        header('Location: /test/view');
    }
}