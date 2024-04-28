<?php
require_once 'db.php';
require_once 'function.php';

//delete
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteFromTable('inquiryinfo', ['id' => $id]);
    header('Location: inquiry.php?msg=Inquiry Deleted');
} else {
    echo "Invalid request.";
}