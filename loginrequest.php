<?php
session_start();
require_once('function.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = selectFromTable('users', ['id', 'username', 'password'], ['username' => $username, 'password' => $password]);

    if (!empty($user)) {
        $_SESSION['user_id'] = $user[0]['id'];
        echo "success";
    } else {
        echo "error";
    }
} else {
    // Handle incorrect access method
    echo "invalid_request";
}