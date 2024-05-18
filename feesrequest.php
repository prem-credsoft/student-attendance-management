<?php
include('function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $studentId = $_POST['student_id'] ?? null;
    $amount = $_POST['amount'] ?? null;
    $message = $_POST['message'] ?? '';
    $paymentDate = date('Y-m-d');
    $dueDate = $_POST['due_date'] ?? null;  // Capture the due date from the form

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
        // Fetch total fees from the studentinfo table
        $studentInfo = selectFromTable('studentinfo', ['total_fees'], ['id' => $studentId]);
        $totalFees = $studentInfo[0]['total_fees'] ?? 0;

        // Recalculate total paid and pending fees
        $totalPaid = selectFromTable('receipt', ['SUM(amount) AS total_paid'], ['student_id' => $studentId]);
        $totalPaid = $totalPaid[0]['total_paid'] ?? 0;
        $newPendingFees = $totalFees - $totalPaid;

        // Determine fee status based on pending fees
        $feeStatus = ($newPendingFees == 0) ? 1 : 0;

        // Update the student info with new pending fees, total paid, fee status, and due date
        updateTable('studentinfo', [
            'pending_fees' => $newPendingFees, 
            'paid_fees' => $totalPaid, 
            'fee_status' => $feeStatus,
            'due_date' => $dueDate  // Update the due date
        ], ['id' => $studentId]);

        echo json_encode(['success' => true, 'message' => "Payment $action successfully."]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to record payment.']);
    }
}
?>
