<?php
require_once 'db.php';
require_once 'function.php';

//delete
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteFromTable('receipt', ['id' => $id]);
    header('Location: fees.php?msg=inquiry Deleted');
} else {
    echo "Invalid request.";
}