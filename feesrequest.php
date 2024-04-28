<?php
include('function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null; // This will be null when adding new fees
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

    if ($id) {
        // Update existing fee
        $result = updateTable('receipt', $data, ['id' => $id]);
        $action = 'updated';
    } else {
        // Insert new fee
        $result = insertIntoTable('receipt', $data);
        $action = 'added';
    }

    if ($result) {
        echo json_encode(['success' => true, 'message' => "Payment $action successfully."]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to record payment.']);
    }
}
?>