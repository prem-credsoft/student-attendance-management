<?php
require_once('function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentId = $_POST['student_id'];
    $reason = $_POST['reason'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];

    // Prepare data for insertion or update
    $data = [
        'student_id' => $studentId,
        'reason' => $reason,
        'start_date' => $startDate,
        'end_date' => $endDate
    ];

    if (isset($_POST['id']) && $_POST['id']) { // Check if it's an update
        $updateId = updateTable('leaves', $data, ['id' => $_POST['id']]);
        if ($updateId) {
            ajaxResponse(true, [], "Leave updated successfully.");
        } else {
            ajaxResponse(false, [], "Failed to update leave request.");
        }
    } else { // Insert new leave request
        $insertId = insertIntoTable('leaves', $data);
        if ($insertId) {
            ajaxResponse(true, ['insertId' => $insertId], "Leave submit successfully.");
        } else {
            ajaxResponse(false, [], "Failed to submit leave request.");
        }
    }
}
?>