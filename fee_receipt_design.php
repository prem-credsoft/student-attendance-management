<?php
include('function.php');

$receiptId = $_GET['id'] ?? null;
$receiptDetails = [];
$studentDetails = [];

if ($receiptId) {
    $receiptDetails = selectFromTable('receipt', ['id', 'student_id', 'amount', 'payment_date', 'message'], ['id' => $receiptId]);
    if (!empty($receiptDetails)) {
        $studentDetails = selectFromTable('studentinfo', ['name', 'batch_name', 'id'], ['id' => $receiptDetails[0]['student_id']]);
    }
}

$receiptNo = $receiptDetails[0]['id'] ?? 'Unknown';
$studentName = $studentDetails[0]['name'] ?? 'Unknown Student';
$batchName = $studentDetails[0]['batch_name'] ?? 'Unknown Batch';
$studentId = $studentDetails[0]['id'] ?? 'Unknown ID';
$amount = $receiptDetails[0]['amount'] ?? '0';
$paymentDate = date('d/m/Y', strtotime($receiptDetails[0]['payment_date'])) ?? date('d/m/Y');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Receipt</title>
    <style>
        body,
        h1,
        h2,
        p {
            margin: 0;
            padding: 0;
        }

        .container {
            border: 2px solid black;
            height: 500px;
            margin-bottom: 20px;
        }

        .headar img {
            width: 80px;
        }

        .navbar {
            display: flex;
            gap: 20px;
            align-items: center;
            padding: 10px;
            justify-content: center;

        }

        .headar p {
            padding: 5px 10px;
            border-width: 2px 0 2px 0;
            border-style: solid;
            text-align: center;
        }

        .line {
            display: flex;
            justify-content: space-between;
        }

        .line div {
            display: flex;
            gap: 10px;
            padding: 3px 15px;
            margin: 5px;
        }

        .line-border div {
            border: 1px solid;
        }

        .flex-column {
            flex-direction: column;
        }

        .flex-right {
            justify-content: right;
        }

        .line2 {
            border-bottom: 1px solid;
        }

        .table {
            width: 100%;
        }

        .table th:first-child {
            width: 10%;
            max-width: 100px;
        }

        .table th:last-child {
            width: 25%;
            max-width: 100px;
        }

        .table th,
        .table td {
            border: 1px solid;
            text-align: center;
            padding: 5px;
        }

        .border-none {
            border: 0px !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="headar">
            <div class="navbar">
                <img src="./asset/img/logo.png" alt="logo">
                <h1> RIE Raval's Institute Of English </h1>
            </div>
            <p> Parishram Complex, Krishnanagar Mainroad Nr. Swaminarayan Choak Rajkot. Mo. 9825278702 </p>
        </div>
        <div class="receipt">
            <div class="line line-border">
                <div>
                    <b>Receipt No.:</b>
                    <p><?php echo htmlspecialchars($receiptNo); ?></p>
                </div>
                <div>
                    <b>Date:</b>
                    <p><?php echo htmlspecialchars($paymentDate); ?></p>
                </div>
            </div>
            <div class="line line2">
                <div>
                    <b>GR No.:</b>
                    <p><?php echo htmlspecialchars($studentId); ?></p>
                </div>
            </div>
            <div class="line line2 flex-column">
                <div>
                    <b>Student Name:</b>
                    <p><u><?php echo htmlspecialchars($studentName); ?></u></p>
                </div>
            </div>
            <div class="line line2">
                <div>
                    <b>Course:</b>
                    <p><u><?php echo htmlspecialchars($batchName); ?></u></p>
                </div>
                <div>
                    <b>Batch:</b>
                    <p><u><?php echo htmlspecialchars($batchName); ?></u></p>
                </div>
            </div>
            <div class="line line2">
                <table class="table">
                    <tr>
                        <th>No.</th>
                        <th>Description</th>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Fully Fees</td>
                        <td><?php echo htmlspecialchars($amount); ?></td>
                    </tr>
                </table>
            </div>
            <div class="line line2">
                <table class="table">
                    <tr>
                        <th class="border-none"></th>
                        <th class="border-none"></th>
                        <th><?php echo htmlspecialchars($amount); ?></th>
                    </tr>
                </table>
            </div>
            <div class="line line2 flex-right">
                <div>
                    <b>Signature:</b>
                    <p>_____________________</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
</html>