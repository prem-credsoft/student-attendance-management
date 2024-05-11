<?php
session_start();
require_once('function.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = selectFromTable('users', ['id', 'username', 'password', 'status'], ['username' => $username, 'password' => $password]);

    if (!empty($user)) {
        $userId = $user[0]['id'];
        $userStatus = $user[0]['status'];

        // Map numeric status to string representation
        $statusMap = [0 => 'super_admin', 1 => 'admin', 2 => 'faculty'];

        if (array_key_exists($userStatus, $statusMap)) {
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_status'] = $statusMap[$userStatus];
            echo json_encode(['status' => 'success', 'userType' => $statusMap[$userStatus]]);
        } else {
            echo json_encode(['status' => 'error']); // Status not recognized
        }
    } else {
        echo json_encode(['status' => 'error']); // User not found or password does not match
    }
} else {
    echo json_encode(['status' => 'invalid_request']);
}
