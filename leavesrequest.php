<?php
require_once ('function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'student_id' => $_POST['student_id'],
        'reason' => $_POST['reason'],
        'start_date' => $_POST['start_date'],
        'end_date' => $_POST['end_date']
    ];

    $response = isset($_POST['id']) ? updateTable('leaves', $data, ['id' => $_POST['id']]) : insertIntoTable('leaves', $data);
    ajaxResponse($response, ['id' => $response], $response ? "Leave processed successfully." : "Failed to process leave request.");
}
?>