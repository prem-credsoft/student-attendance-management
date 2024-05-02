<?php
include('db.php');
include('function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $date = $_POST['date'];
    $status = $_POST['status']; // 0 for present, 1 for absent, 2 for leave

    // Insert or update the attendance record
    $exists = selectFromTable('attendance', ['id'], ['student_id' => $student_id, 'date' => $date]);
    if ($exists) {
        updateTable('attendance', ['status' => $status], ['id' => $exists[0]['id']]);
    } else {
        insertIntoTable('attendance', ['student_id' => $student_id, 'date' => $date, 'status' => $status]);
    }
    ajaxResponse(true, [], "Attendance updated successfully");
}
?>