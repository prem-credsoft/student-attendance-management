<?php
require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $attendanceId = $_POST['attendance_id'] ?? null;
    $action = $_POST['action'] ?? null; // '1' for accept, '2' for reject

    if ($attendanceId && $action) {
        // Prepare data for updating
        $updateData = ['leave_status' => $action];
        
        // If action is '2' (reject), set status to 4 (blank)
        if ($action == '2') {
            $updateData['status'] = '4';
        }

        $updateSuccess = updateTable('attendance', $updateData, ['id' => $attendanceId]);

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
