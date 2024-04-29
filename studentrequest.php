<?php
require_once 'function.php';
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => $_POST['studentName'] ?? '',
        'batch' => $_POST['batch'] ?? '',
        'father_name' => $_POST['fatherName'] ?? '',
        'mother_name' => $_POST['motherName'] ?? '',
        'dob' => $_POST['dob'] ?? '',
        'gender' => $_POST['gender'] ?? '',
        'mobile_number' => $_POST['mobileNumber'] ?? '',
        'fee_status' => $_POST['feeStatus'] ?? '',
        'profession' => $_POST['profession'] ?? 'Other',
        'address' => $_POST['address'] ?? '',
        'admission_time' => date('Y-m-d'),
    ];

    if (!empty($_POST['id'])) {
        // Update existing student
        $id = $_POST['id'];
        $result = updateTable('studentinfo', $data, ['id' => $id]);
        $actionResult = $result ? "Student Details updated successfully." : "Failed to update Student Details.";
    } else {
        // Insert new student
        $result = insertIntoTable('studentinfo', $data);
        $actionResult = $result ? "Student Details submitted successfully." : "Failed to submit Student Details.";
    }

    header('Content-Type: application/json');
    echo json_encode([
        'success' => $result,
        'message' => $actionResult
    ]);
    exit;
} else {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method.'
    ]);
    exit;
}
?>
