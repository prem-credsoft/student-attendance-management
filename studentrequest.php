<?php
require_once 'function.php';
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $batchId = $_POST['batch'] ?? '';
    $batchName = selectFromTable('batch_table', ['name'], ['id' => $batchId])[0]['name'] ?? '';

    $data = [
        'name' => $_POST['studentName'] ?? '',
        'batch' => $batchId,
        'batch_name' => $batchName,
        'father_name' => $_POST['fatherName'] ?? '',
        'mother_name' => $_POST['motherName'] ?? '',
        'dob' => $_POST['dob'] ?? '',
        'gender' => $_POST['gender'] ?? '',
        'mobile_number' => $_POST['mobileNumber'] ?? '',
        'profession' => $_POST['profession'] ?? 'Other',
        'address' => $_POST['address'] ?? '',
        'admission_time' => date('Y-m-d'),
        'discount' => $_POST['discount'] ?? 0,
        'total_fees' => $_POST['totalFees'] ?? 0
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
        
        // Check if this is from an inquiry and delete the inquiry if the insert was successful
        if ($result && !empty($_POST['inquiryId'])) {
            $inquiryId = $_POST['inquiryId'];
            $deleteResult = deleteFromTable('inquiryinfo', ['id' => $inquiryId]);
            if (!$deleteResult) {
                $actionResult = "Failed to delete inquiry after adding student.";
            }
        }
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
