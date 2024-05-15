<?php
include('function.php');
require 'vendor/autoload.php';

use Dompdf\Dompdf;

$receiptId = $_GET['id'] ?? null;
if ($receiptId) {
    $receipt = selectFromTable('receipt', ['id', 'student_id', 'amount', 'payment_date', 'message'], ['id' => $receiptId])[0];
    $studentInfo = selectFromTable('studentinfo', ['name'], ['id' => $receipt['student_id']])[0];

    $html = '
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; }
            .header, .subheader, .info { width: 100%; text-align: center; }
            .header { font-size: 18px; font-weight: bold; margin-bottom: 20px; }
            .subheader { font-size: 14px; font-weight: bold; margin-top: 10px; margin-bottom: 5px; }
            .info { font-size: 12px; margin-top: 5px; margin-bottom: 5px; }
            .container { width: 60%; margin: 0 auto; border: 1px solid #000; padding: 20px; box-sizing: border-box; }
            .table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
            .table th, .table td { border: 1px solid #000; padding: 8px; text-align: left; }
            .table th { background-color: #f2f2f2; }
            .footer { text-align: center; font-size: 12px; margin-top: 20px; }
            .logo { text-align: left; margin-bottom: 20px; }
            .logo img { width: 100px; height: 100px; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="logo">
                <img src="./asset/img/logo.png" alt="Raval English Institute">
            </div>
            <div class="header">Raval English Institute</div>
            <div class="subheader">Fee - Receipt</div>
            <table class="table">
                <tr>
                    <th>Receipt No.</th>
                    <td>' . $receipt['id'] . '</td>
                    <th>Date</th>
                    <td>' . $receipt['payment_date'] . '</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>' . $studentInfo['name'] . '</td>
                    <th>Class</th>
                    <td>X</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td>TUITION FEES/Nov</td>
                    <td>' . $receipt['amount'] . '</td>
                </tr>
            </table>
            <div class="info">Received in Cash</div>
            <div class="footer">Parishram Complex, Krishnanagar Main Rd, near Rajkot, Swaminarayan Chowk, Krishna Nagar, Sardar Nagar, Rajkot, Gujarat 360004</div>
        </div>
    </body>
    </html>';

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("receipt.pdf", array("Attachment" => false));
}
?>