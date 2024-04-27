<?php
require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $paid_fees = $_POST['paid_fees'];
    $message = $_POST['message']; // Assuming you want to store this message somewhere

    // Fetch existing fee details to calculate totals
    $existingFees = selectFromTable('student_fees', ['paid_fees'], ['student_id' => $student_id]);
    $totalPaid = $existingFees[0]['paid_fees'] + $paid_fees;
    $pendingFees = 9800 - $totalPaid; // Assuming $9800 is the total fee

    // Update the database
    $result = updateTable('student_fees', ['paid_fees' => $totalPaid, 'fee_status' => $pendingFees > 0 ? 'Partially Paid' : 'Fully Paid'], ['student_id' => $student_id]);

    if ($result) {
        echo "Payment updated successfully. Total paid: $totalPaid, Pending: $pendingFees";
    } else {
        echo "Failed to update payment.";
    }
}
?>