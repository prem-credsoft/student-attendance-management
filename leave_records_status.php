<?php
require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $attendanceId = $_POST['attendance_id'] ?? null;
    $action = $_POST['action'] ?? null; // '1' for accept, '2' for reject

    if ($attendanceId && $action) {
        $updateSuccess = updateTable('attendance', ['leave_status' => $action], ['id' => $attendanceId]);

        if ($updateSuccess) {
            ajaxResponse(true, [], 'Leave status updated successfully.');
        } else {
            ajaxResponse(false, [], 'Failed to update leave status.');
        }
    } else {
        ajaxResponse(false, [], 'Invalid request.');
    }
}
?>
