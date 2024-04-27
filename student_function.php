<?php
require_once 'function.php';
$id = $_GET['id'] ?? null;
if ($id) {
    $result = deleteFromTable('studentinfo', ['id' => $id]);
    if ($result) {
        echo "<script>alert('Record deleted successfully'); window.location.href='studentsdetails.php';</script>";
    } else {
        echo "<script>alert('Failed to delete record'); window.location.href='studentsdetails.php';</script>";
    }
}
?>