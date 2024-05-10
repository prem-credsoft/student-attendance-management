<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Student Form</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<?php include('./header.php'); ?>
<?php require_once('function.php'); ?>
<?php include('db.php'); ?>

<?php
$inquiryData = null;
$studentData = null;
$isUpdate = false;
$isFromInquiry = false;
$batches = selectFromTable('batch_table', ['name', 'id'], []);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $inquiryData = selectFromTable('inquiryinfo', ['*'], ['id' => $id])[0] ?? null;
    if ($inquiryData) {
        $isFromInquiry = true;
    } else {
        $studentData = selectFromTable('studentinfo', ['*'], ['id' => $id])[0] ?? null;
        $isUpdate = true;
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Student Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Student Form</li>
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
                            <h3 class="card-title">Student Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" id="studentForm">
                            <!-- Include hidden field for ID if updating -->
                            <?php if ($isUpdate): ?>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <?php endif; ?>
                            <!-- Include hidden field for inquiryId if from inquiry -->
                            <?php if ($isFromInquiry): ?>
                                <input type="hidden" name="inquiryId" value="<?php echo $inquiryData['id']; ?>">
                            <?php endif; ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="studentName">Student Name</label>
                                    <input type="text" class="form-control" id="studentName" name="studentName"
                                        placeholder="Enter Student Name"
                                        value="<?php echo htmlspecialchars($inquiryData['name'] ?? $studentData['name'] ?? ''); ?>">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fatherName">Father Name</label>
                                            <input type="text" class="form-control" id="fatherName" name="fatherName"
                                                placeholder="Father Name"
                                                value="<?php echo htmlspecialchars($studentData['father_name'] ?? ''); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="motherName">Mother Name</label>
                                            <input type="text" class="form-control" id="motherName" name="motherName"
                                                placeholder="Mother Name"
                                                value="<?php echo htmlspecialchars($studentData['mother_name'] ?? ''); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dob">Date of birth</label>
                                            <input type="date" class="form-control" id="dob" name="dob"
                                                value="<?php echo htmlspecialchars($studentData['dob'] ?? ''); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option value="Male" <?php echo ($studentData && $studentData['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                                <option value="Female" <?php echo ($studentData && $studentData['gender'] == 'Female') ? 'selected' : ''; ?>>Female
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobileNumber">Mobile Number</label>
                                            <input type="tel" class="form-control" id="mobileNumber" maxlength="10"
                                                name="mobileNumber" placeholder="Mobile Number"
                                                value="<?php echo htmlspecialchars($inquiryData['mobile_number'] ?? $studentData['mobile_number'] ?? ''); ?>"
                                                onkeypress="return onlyNumbers(event)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="profession">Profession</label>
                                            <select class="form-control" id="profession" name="profession" required>
                                                <option value="Student" <?php echo ($inquiryData && $inquiryData['profession'] == 'Student') || ($studentData && $studentData['profession'] == 'Student') ? 'selected' : ''; ?>>Student
                                                </option>
                                                <option value="Housewife" <?php echo ($inquiryData && $inquiryData['profession'] == 'Housewife') || ($studentData && $studentData['profession'] == 'Housewife') ? 'selected' : ''; ?>>
                                                    Housewife
                                                </option>
                                                <option value="Working Professional" <?php echo ($inquiryData && $inquiryData['profession'] == 'Working Professional') || ($studentData && $studentData['profession'] == 'Working Professional') ? 'selected' : ''; ?>>
                                                    Working Professional</option>
                                                <option value="Kids" <?php echo ($inquiryData && $inquiryData['profession'] == 'Kids') || ($studentData && $studentData['profession'] == 'Kids') ? 'selected' : ''; ?>>Kids
                                                </option>
                                                <option value="Other" <?php echo ($inquiryData && $inquiryData['profession'] == 'Other') || ($studentData && $studentData['profession'] == 'Other') ? 'selected' : ''; ?>>Other
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="discount">Discount</label>
                                            <input type="text" class="form-control" id="discount" name="discount"
                                                placeholder="Enter Discount"
                                                value="<?php echo htmlspecialchars($studentData['discount'] ?? ''); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="totalFees">Total Fees</label>
                                            <input type="number" class="form-control" id="totalFees" name="totalFees"
                                                placeholder="Enter Total Fees"
                                                value="<?php echo htmlspecialchars($studentData['total_fees'] ?? ''); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="selectPicker">Batch</label>
                                            <select class="form-control select2" id="batch" name="batch">
                                                <?php foreach ($batches as $batch): ?>
                                                    <option value="<?php echo htmlspecialchars($batch['id']); ?>" <?php echo (isset($studentData['batch']) && $studentData['batch'] == $batch['id']) ? 'selected' : ''; ?>>
                                                        <?php echo htmlspecialchars($batch['name']); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="Enter Address"
                                                value="<?php echo htmlspecialchars($inquiryData['address'] ?? $studentData['address'] ?? ''); ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </form>
                        <button class="btn btn-primary" id="submitInquiry"><?php echo $isUpdate ? 'Update' : 'Submit'; ?></button>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: "Select a Batch",
            allowClear: true
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#submitInquiry').click(function () {
            var formData = $('form').serialize();
            $.ajax({
                type: 'POST',
                url: 'studentrequest.php',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    alert(response.message); // Display the message from studentrequest.php
                    if (response.success) {
                        window.location.href = 'studentsdetails.php'; // Redirect to a generic page on success
                    } else {
                        alert("Error submitting details: " + response.message);
                    }
                },
                error: function () {
                    alert("An error occurred.");
                }
            });
        });
    });
</script>

<script>
    function onlyNumbers(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            evt.preventDefault();
            return false;
        }
        return true;
    }
</script>

<?php include ('./footer.php'); ?>
