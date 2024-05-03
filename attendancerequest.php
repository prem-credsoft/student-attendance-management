<?php
include('db.php');
include('function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['batch_id']) && !empty($_POST['status'])) {
        $batch_id = $_POST['batch_id'];
        $statuses = $_POST['status'];

        foreach ($statuses as $student_id => $dates) {
            foreach ($dates as $date => $status) {
                if ($date <= date("Y-m-d")) {
                    $existing = selectFromTable('attendance', ['id'], ['student_id' => $student_id, 'date' => $date]);
                    if ($existing) {
                        updateTable('attendance', ['status' => $status], ['id' => $existing[0]['id']]);
                    } else {
                        insertIntoTable('attendance', [
                            'student_id' => $student_id,
                            'date' => $date,
                            'status' => $status,
                            'batch_id' => $batch_id
                        ]);
                    }
                }
            }
        }
        echo json_encode(['success' => true, 'message' => 'Attendance updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Missing required data']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>