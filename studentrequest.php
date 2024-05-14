<?php
require_once 'function.php';
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $batchId = $_POST['batch'] ?? '';
    $batchName = selectFromTable('batch_table', ['name'], ['id' => $batchId])[0]['name'] ?? '';

    // Determine the correct profession value
    $profession = $_POST['profession'] ?? '';
    if ($profession === 'Other') {
        $profession = $_POST['otherProfession'] ?? 'Other'; // Use the input from the otherProfession field if 'Other' is selected
    }

    $data = [
        'name' => $_POST['studentName'] ?? '',
        'batch' => $batchId,
        'batch_name' => $batchName,
        'father_name' => $_POST['fatherName'] ?? '',
        'mother_name' => $_POST['motherName'] ?? '',
        'dob' => $_POST['dob'] ?? '',
        'gender' => $_POST['gender'] ?? '',
        'mobile_number' => $_POST['mobileNumber'] ?? '',
        'profession' => $profession,
        'address' => $_POST['address'] ?? '',
        'admission_time' => date('Y-m-d'),
        'discount' => $_POST['discount'] ?? 0,
        'total_fees' => $_POST['totalFees'] ?? 0,
        'reference' => $_POST['reference'] ?? '',
        'home_number' => $_POST['homeNumber'] ?? '', 
        'father_number' => $_POST['fatherNumber'] ?? '',
        'father_profession' => $_POST['fatherProfession'] ?? '',
        'workplace_address' => $_POST['workPlaceAddress'] ?? '',
        'aadharcard_number' => $_POST['aadharcardNumber'] ?? '',
        'joining_purpose' => $_POST['joiningPurpose'] ?? '',
        'extratime_daily' => $_POST['extraTimeDaily'] ?? ''
    ];

    $studentId = null;
    $isNewStudent = empty($_POST['id']);

    if ($isNewStudent) {
        // Insert new student
        $result = insertIntoTable('studentinfo', $data);
        $studentId = $result ? $result : null; // Use the returned lastInsertId
        $actionResult = $result ? "Student Details submitted successfully." : "Failed to submit Student Details.";
    } else {
        // Update existing student
        $studentId = $_POST['id'];
        $result = updateTable('studentinfo', $data, ['id' => $studentId]);
        $actionResult = $result ? "Student Details updated successfully." : "Failed to update Student Details.";
    }

    // Calculate and update pending fees
    if ($result) {
        $totalPayments = selectFromTable('receipt', ['SUM(amount) as total_payments'], ['student_id' => $studentId])[0]['total_payments'] ?? 0;
        $pendingFees = $data['total_fees'] - $totalPayments - $data['discount'];
        $updatePendingFees = updateTable('studentinfo', ['pending_fees' => $pendingFees], ['id' => $studentId]);
        if (!$updatePendingFees) {
            $actionResult .= " Failed to update pending fees.";
        }
    }

    // Handle scholarship as a receipt if there's a discount (update receipt on fees table)
    // if ($result && !empty($data['discount'])) {
    //     $receiptData = [
    //         'student_id' => $studentId,
    //         'amount' => $data['discount'],
    //         'payment_date' => date('Y-m-d'),
    //         'message' => 'Scholarship'
    //     ];
    //     $receiptResult = insertIntoTable('receipt', $receiptData);
    //     if (!$receiptResult) {
    //         $actionResult .= " However, failed to record the scholarship receipt.";
    //     }
    // }

    // Handle inquiry deletion if applicable
    if ($result && $isNewStudent && !empty($_POST['inquiryId'])) {
        $inquiryId = $_POST['inquiryId'];
        $deleteResult = deleteFromTable('inquiryinfo', ['id' => $inquiryId]);
        if (!$deleteResult) {
            $actionResult .= " Failed to delete inquiry after adding student.";
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
