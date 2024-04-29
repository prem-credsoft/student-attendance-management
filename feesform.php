<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Fees Form</title>
</head>

<?php
include ('./header.php');
require_once ('function.php');
require_once ('db.php');

$editMode = false;
$studentId = '';
$amount = '';
$message = '';
$paymentDate = '';

if (isset($_GET['id'])) {
    $editMode = true;
    $feeDetails = selectFromTable('receipt', ['student_id', 'amount', 'message', 'payment_date'], ['id' => $_GET['id']]);
    if ($feeDetails) {
        $studentId = $feeDetails[0]['student_id'];
        $amount = $feeDetails[0]['amount'];
        $message = $feeDetails[0]['message'];
        $paymentDate = $feeDetails[0]['payment_date'];
    }
}

$students = selectFromTable('studentinfo', ['id', 'name'], []);
if (!$students) {
    die("Could not retrieve data from the database.");
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Fees Form</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Fees Form</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- General form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Fees Details</h3>

                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="inquiryForm" method="POST" action="feesrequest.php">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="selectPicker">Student Detail</label>
                                            <select class="selectpicker form-control" id="selectPicker"
                                                name="student_id" data-live-search="true">
                                                <?php foreach ($students as $student): ?>
                                                    <option value="<?php echo htmlspecialchars($student['id']); ?>"
                                                        <?php echo $studentId == $student['id'] ? 'selected' : ''; ?>>
                                                        <?php echo htmlspecialchars($student['name']); ?>,
                                                        RIE - <?php echo htmlspecialchars($student['id']); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="total_fees">Total Fees</label>
                                            <input type="text" class="form-control" id="total_fees" name="total_fees"
                                                value="9800" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input type="text" class="form-control" id="amount" name="amount"
                                                placeholder="Enter Amount" required value="<?php echo htmlspecialchars($amount); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <input type="text" class="form-control" id="message" name="message"
                                                placeholder="Enter Message" value="<?php echo htmlspecialchars($message); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pending_fees">Pending Fees</label>
                                            <input type="text" class="form-control" id="pending_fees"
                                                name="pending_fees" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="total_paid">Student Total Paid</label>
                                            <input type="text" class="form-control" id="total_paid" name="total_paid"
                                                value="" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add a hidden input to handle the ID when updating -->
                            <?php if ($editMode): ?>
                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                            <?php endif; ?>
                            <button type="button" class="btn btn-primary" id="submitInquiry"><?php echo $editMode ? 'Update' : 'Submit'; ?></button>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('button').click(function () {
            var formData = $('form').serialize();
            // console.log(formData);
            $.ajax({
                type: 'POST',
                url: 'feesrequest.php',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        alert("Form Submit successfully");
                        window.location.href = './fees.php';
                    } else {
                        alert("Error submitting details.");
                    }
                },
                error: function() {
                    alert("Error submitting details."); // Fallback error message
                }
            });
        });

        var initialTotalFees = 9800;

        $('#amount').on('input', function() {
            var amountEntered = parseFloat($(this).val() || 0);
            var totalPaid = parseFloat($('#total_paid').val() || 0);
            var newTotalPaid = amountEntered;
            var pendingFees = initialTotalFees - newTotalPaid;

            $('#total_paid').val(newTotalPaid.toFixed(2));
            $('#pending_fees').val(pendingFees.toFixed(2));
        });
    });
</script>
<?php include ('./footer.php'); ?>
</body>

</html>


