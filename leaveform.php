<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Leaves Form</title>
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<?php
include('./header.php');
require_once('function.php');
require_once('db.php');

$editMode = false;
$studentId = '';
$reason = '';
$startDate = '';
$endDate = '';

if (isset($_GET['id'])) {
    $editMode = true;
    $leaveDetails = selectFromTable('leaves', ['student_id', 'reason', 'start_date', 'end_date'], ['id' => $_GET['id']]);
    if ($leaveDetails) {
        $studentId = $leaveDetails[0]['student_id'];
        $reason = $leaveDetails[0]['reason'];
        $startDate = $leaveDetails[0]['start_date'];
        $endDate = $leaveDetails[0]['end_date'];
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
                    <h1 class="m-0">Leaves Form</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Leaves Form</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- General form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Leaves Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="inquiryForm" method="POST" action="feesrequest.php">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="selectPicker">Student Detail</label>
                                    <select class="form-control select2" id="selectPicker" name="student_id">
                                        <?php foreach ($students as $student): ?>
                                            <option value="<?php echo htmlspecialchars($student['id']); ?>"
                                                <?php echo $studentId == $student['id'] ? 'selected' : ''; ?>>
                                                <?php echo htmlspecialchars($student['name']); ?>,
                                                RIE - <?php echo htmlspecialchars($student['id']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="reason">Reason</label>
                                    <input type="text" class="form-control" id="reason" name="reason" value="<?php echo htmlspecialchars($reason); ?>">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="startDate">Start Date</label>
                                            <input type="date" class="form-control" id="startDate" name="start_date" value="<?php echo htmlspecialchars($startDate); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="endDate">End Date</label>
                                            <input type="date" class="form-control" id="endDate" name="end_date" value="<?php echo htmlspecialchars($endDate); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add a hidden input to handle the ID when updating -->
                            <?php if ($editMode): ?>
                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                            <?php endif; ?>
                        </form>
                        <button class="btn btn-primary" id="submitLeaves"><?php echo $editMode ? 'Update' : 'Submit'; ?></button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select a student",
            allowClear: true
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('button').click(function () {
            var formData = $('form').serialize();
            // console.log(formData);
            $.ajax({
                type: 'POST',
                url: 'leavesrequest.php',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        window.location.href = './leaves.php';
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert("Error submitting details.");
                }
            });
        });
    });
</script>

<?php include ('./footer.php'); ?>
</body>
</html>
