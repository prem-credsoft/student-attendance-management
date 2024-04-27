<?php
include('function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentId = $_POST['student_id'] ?? null;
    $amount = $_POST['amount'] ?? null;
    $message = $_POST['message'] ?? '';
    $paymentDate = date('Y-m-d'); // Current date or from a form field

    // Validate data here (ensure it's not empty, etc.)
    if (!$studentId || !$amount) {
        echo json_encode(['success' => false, 'message' => 'Required fields are missing.']);
        exit;
    }

    $data = [
        'student_id' => $studentId,
        'amount' => $amount,
        'payment_date' => $paymentDate,
        'message' => $message
    ];

    $result = insertIntoTable('receipt', $data);

    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Payment recorded successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to record payment.']);
    }
}
?>