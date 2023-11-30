<?php

declare(strict_types=1);

include 'db_connection.php';

spl_autoload_register(function ($class) {
    $class = str_replace("\\", "/", $class);
    require_once "$class.php";
});

$url = $_GET['url'] ?? '';

$parts = explode('/', $url);

$userModel = new \Models\UserModel($db);
$models = [
    'userModel' => $userModel,
];

$controllerName = isset($parts[0]) && $parts[0] !== '' ? $parts[0] : 'Default';
$methodName = isset($parts[1]) && $parts[1] !== '' ? $parts[1] : 'default';

$controllerClassName = ucfirst($controllerName) . 'Controller';
$controllerFilePath = 'Controllers/' . $controllerClassName . '.php';

if (file_exists($controllerFilePath)) {
    require_once $controllerFilePath;
    $controllerClassName = "\\Controllers\\$controllerClassName";
    $controller = new $controllerClassName($models);

    // call controller method
    if (method_exists($controller, $methodName)) {
        call_user_func_array([$controller, $methodName], array_values($models));
    } else {
        echo "Method '$methodName' not found.";
    }
} else {
    echo "Controller '$controllerClassName' not found.";
}