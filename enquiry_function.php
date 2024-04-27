<?php
require_once 'db.php';
require_once 'function.php';

//delete
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteFromTable('enquirieinfo', ['id' => $id]);
    header('Location: enquiries.php?msg=Enquiry Deleted');
} else {
    echo "Invalid request.";
}