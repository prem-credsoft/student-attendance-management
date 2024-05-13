<?php
require_once 'db.php';
require_once 'function.php';

// Delete receipt and update pending fees
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $receiptInfo = selectFromTable('receipt', ['student_id', 'amount'], ['id' => $id])[0];
    $studentId = $receiptInfo['student_id'];
    $amount = $receiptInfo['amount'];

    deleteFromTable('receipt', ['id' => $id]);

    // Recalculate total paid fees
    $totalPaidResults = selectFromTable('receipt', ['SUM(amount) AS total_paid'], ['student_id' => $studentId]);
    $totalPaid = $totalPaidResults[0]['total_paid'] ?? 0;

    // Fetch total fees from the studentinfo table
    $studentInfo = selectFromTable('studentinfo', ['total_fees'], ['id' => $studentId]);
    $totalFees = $studentInfo[0]['total_fees'] ?? 0;

    // Calculate new pending fees
    $newPendingFees = $totalFees - $totalPaid;

    // Update pending fees in studentinfo table
    updateTable('studentinfo', ['pending_fees' => $newPendingFees], ['id' => $studentId]);

    header('Location: fees_receipt.php?student_id=' . $studentId . '&msg=Receipt Deleted');
} else {
    echo "Invalid request.";
}
