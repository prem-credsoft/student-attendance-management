<?php
require_once 'db.php';
require_once 'function.php';

//delete
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteFromTable('users', ['id' => $id]);
    header('Location: user_management.php?msg=user Deleted');
} else {
    echo "Invalid request.";
}