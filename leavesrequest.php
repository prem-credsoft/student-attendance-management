<?php
require_once('function.php');
require_once('db.php'); // Ensure you have included the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $Reason = $_POST['Reason'];
    $date = $_POST['date'];
    $status = $_POST['status']; // This should always be 2 as set in the form
    $batch_id = $_POST['batch_id']; // Captured from the form

    $data = [
        'student_id' => $student_id,
        'Reason' => $Reason,
        'date' => $date,
        'status' => $status,    
        'batch_id' => $batch_id
    ];

    // Check if updating or inserting
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $response = updateTable('attendance', $data, ['id' => $id]);
    } else {
        $response = insertIntoTable('attendance', $data);
    }

    if ($response) {
        echo json_encode(['success' => true, 'message' => 'Leave processed successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to process leave request.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
?>