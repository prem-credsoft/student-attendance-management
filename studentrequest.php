<?php
require_once 'function.php';
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Required fields list
    $requiredFields = [
        'studentName', 'dob', 'gender', 'mobileNumber', 'address', 'joiningPurpose', 
        'extraTimeDaily', 'gmailId', 'fatherName', 'motherName', 'fatherNumber', 'homeNumber', 
        'fatherProfession', 'workPlaceAddress', 'aadharcardNumber', 'batch', 'reference', 'profession'
    ];

    $missingFields = [];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $missingFields[] = $field;
        }
    }

    if (!empty($missingFields)) {
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'message' => "Missing required fields: " . implode(', ', $missingFields)
        ]);
        exit;
    }

    // Additional specific validations
    $errors = [];

    // Validate Gmail ID
    if (!filter_var($_POST['gmailId'], FILTER_VALIDATE_EMAIL) || strpos($_POST['gmailId'], '@') === false || strpos($_POST['gmailId'], '.') === false) {
        $errors[] = 'Invalid Gmail ID. It must be a valid Gmail address.';
    }

    // Validate phone numbers
    $phoneFields = ['mobileNumber', 'fatherNumber', 'homeNumber'];
    foreach ($phoneFields as $phoneField) {
        if (!preg_match('/^[6-9]\d{9}$/', $_POST[$phoneField])) {
            $errors[] = ucfirst($phoneField) . ' is Invaild';
        }
    }

    // Validate Aadhar card number
    if (!preg_match('/^\d{12}$/', $_POST['aadharcardNumber'])) {
        $errors[] = 'Aadhar number is Invaild.';
    }

    // Validate profession
    // $validProfessions = ['Student', 'Housewife', 'Working Professional', 'Kids', 'Other'];
    // if (!in_array($_POST['profession'], $validProfessions)) {
    //     $errors[] = 'Invalid profession selected.';
    // }

    if (!empty($errors)) {
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'message' => implode("\n", $errors)
        ]);
        exit;
    }

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
        'due_date' => $_POST['dueDate'] ?? null,
        'discount' => $_POST['discount'] ?? 0,
        'total_fees' => $_POST['totalFees'] ?? 0,
        'reference' => $_POST['reference'] ?? '',
        'home_number' => $_POST['homeNumber'] ?? '', 
        'father_number' => $_POST['fatherNumber'] ?? '',
        'father_profession' => $_POST['fatherProfession'] ?? '',
        'workplace_address' => $_POST['workPlaceAddress'] ?? '',
        'aadharcard_number' => $_POST['aadharcardNumber'] ?? '',
        'joining_purpose' => $_POST['joiningPurpose'] ?? '',
        'extratime_daily' => $_POST['extraTimeDaily'] ?? '',
        'gmail_id' => $_POST['gmailId'] ?? ''
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
        $pendingFees = (int)$data['total_fees'] - (int)$totalPayments - (int)$data['discount'];
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
