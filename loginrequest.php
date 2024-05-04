<?php
session_start();
require_once('function.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to select user with matching username and password
    $user = selectFromTable('users', ['id', 'username', 'password', 'status'], ['username' => $username, 'password' => $password]);

    if (!empty($user) && $user[0]['status'] == 0) { // Check if user is super admin
        $_SESSION['user_id'] = $user[0]['id'];
        $_SESSION['user_status'] = 'super_admin';
        echo "success";
    } elseif (!empty($user) && $user[0]['status'] == 1) { // Check if user is admin
        $_SESSION['user_id'] = $user[0]['id'];
        $_SESSION['user_status'] = 'admin';
        echo "success";
    } else {
        echo "error";
    }
} else {
    // Handle incorrect access method
    echo "invalid_request";
}