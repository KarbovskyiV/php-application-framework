<?php

$host = 'localhost';
$databaseName = 'example_db';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$databaseName;charset=utf8";

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $error) {
    if ($error->getCode() == 1045) {
        echo 'Connection failed due to incorrect login details';
    } else {
        echo 'Connection failed with error code ' . $error->getCode();
    }
}