<?php
require_once 'db.php';
require_once 'function.php';

//delete
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteFromTable('leaves', ['id' => $id]);
    header('Location: leaves.php?msg=leaves Deleted');
} else {
    echo "Invalid request.";
}