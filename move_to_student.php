<?php
require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['student_id'])) {
    $studentId = $_POST['student_id'];
    $result = updateTable('studentinfo', ['alumnistudent' => 0], ['id' => $studentId]);
    
    if ($result) {
        ajaxResponse(true, [], "Student moved to student successfully.");
    } else {
        ajaxResponse(false, [], "Failed to move alumni to student.");
    }
}
?>