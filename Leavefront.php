<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leaves</title>
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./asset/css/adminlte.min.css">
    <style>
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 250vh;
            max-width: 1000px;
            margin: 0 auto;
            /* padding: 15px; */
        }

        .form-control {
            width: 100%;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .card {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
<?php
// include('./header.php');
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

<div class="center-container">
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
</div>
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
                        window.location.href = './leavefront.php';
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


</body>
</html>
