
<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $db->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $query->execute(['username' => $username, 'password' => $password]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        echo "success";
    } else {
        echo "error";
    }
} else {
    // Handle incorrect access method
    echo "invalid_request";
}