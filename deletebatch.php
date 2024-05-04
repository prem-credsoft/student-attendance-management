<?php
require_once('function.php');

session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = deleteFromTable('batch_table', ['id' => $id]);

    if ($result) {
        $_SESSION['message'] = "Batch deleted successfully.";
    } else {
        $_SESSION['message'] = "Failed to delete batch.";
    }
} else {
    $_SESSION['message'] = "No batch ID provided.";
}

header('Location: batch.php');
exit();
?>