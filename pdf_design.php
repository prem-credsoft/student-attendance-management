<?php
include('function.php');

header('Content-Type: application/json'); // Ensure the output is treated as JSON

$receiptId = $_GET['id'] ?? null;
if ($receiptId) {
    $receipt = selectFromTable('receipt', ['id', 'student_id', 'amount', 'payment_date', 'message'], ['id' => $receiptId])[0];
    $studentInfo = selectFromTable('studentinfo', ['name'], ['id' => $receipt['student_id']])[0];

    $pdfDoc = [
        'content' => [
            ['text' => 'Fees Receipt', 'style' => 'header'],
            ['text' => 'Student Name: ' . $studentInfo['name'], 'style' => 'subheader'],
            ['text' => 'Amount: ' . $receipt['amount'], 'style' => 'info'],
            ['text' => 'Payment Date: ' . $receipt['payment_date'], 'style' => 'info'],
            ['text' => 'Message: ' . $receipt['message'], 'style' => 'info'],
        ],
        'styles' => [
            'header' => [
                'fontSize' => 22,
                'bold' => true,
                'alignment' => 'center',
                'margin' => [0, 0, 0, 20]  // left, top, right, bottom
            ],
            'subheader' => [
                'fontSize' => 16,
                'bold' => true,
                'margin' => [0, 10, 0, 5]  // left, top, right, bottom
            ],
            'info' => [
                'fontSize' => 14,
                'bold' => false,
                'margin' => [0, 5, 0, 5]  // left, top, right, bottom
            ]
        ],
        'defaultStyle' => [
            'columnGap' => 20
        ]
    ];

    echo json_encode($pdfDoc);
}
?>