<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Student From</title>
</head>


<?php include ('./header.php'); ?>
<?php include ('function.php'); ?>
<?php include ('db.php'); ?>

<?php
$inquiryData = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM inquiryinfo WHERE id = ?");
    $stmt->execute([$id]);
    $inquiryData = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $profession = $_POST['profession'] ?? 'Other'; // Ensure profession is set or default to 'Other'

    $data = [
        'student_name' => $_POST['studentName'] ?? '',
        'batch' => $_POST['batch'] ?? '',
        'father_name' => $_POST['fatherName'] ?? '',
        'mother_name' => $_POST['motherName'] ?? '',
        'dob' => $_POST['dob'] ?? '',
        'gender' => $_POST['gender'] ?? '',
        'mobile_number' => $_POST['mobileNumber'] ?? '',
        'fee_status' => $_POST['feeStatus'] ?? '',
        'profession' => $profession,
        'address' => $_POST['address'] ?? '',
        'admission_time' => date('Y-m-d'),
    ];


    if (in_array('', $data)) {
        ajaxResponse(false, [], "All fields are required.");
    }

    $result = insertIntoTable('studentinfo', $data);
    if ($result) {
        ajaxResponse(true, [], "Student Details submitted successfully.");
    } else {
        ajaxResponse(false, [], "Failed to submit Student Details.");
    }
    exit; // Prevent further execution after AJAX call
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Student From</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Student From</li>
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
                        <form method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="studentName">Student Name</label>
                                    <input type="text" class="form-control" id="studentName" name="studentName"
                                        placeholder="Enter Student Name"
                                        value="<?php echo $inquiryData ? htmlspecialchars($inquiryData['name']) : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="batch">Batch</label>
                                    <input type="text" class="form-control" id="batch" name="batch" placeholder="Batch">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fatherName">Father Name</label>
                                            <input type="text" class="form-control" id="fatherName" name="fatherName"
                                                placeholder="Father Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="motherName">Mother Name</label>
                                            <input type="text" class="form-control" id="motherName" name="motherName"
                                                placeholder="Mother Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dob">Date of birth</label>
                                            <input type="date" class="form-control" id="dob" name="dob">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
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
                                                value="<?php echo $inquiryData ? htmlspecialchars($inquiryData['mobile_number']) : ''; ?>"
                                                onkeypress="return onlyNumbers(event)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="feeStatus">Fee Status</label>
                                            <select class="form-control" id="feeStatus" name="feeStatus">
                                                <option value="Fully Paid">Fully Paid</option>
                                                <option value="Partially Paid">Partially Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add Profession Field -->
                                <div class="form-group">
                                    <label for="profession">Profession</label>
                                    <select class="form-control" id="profession" name="profession" required>
                                        <option value="Student" <?php echo $inquiryData && $inquiryData['profession'] == 'Student' ? 'selected' : ''; ?>>Student</option>
                                        <option value="Housewife" <?php echo $inquiryData && $inquiryData['profession'] == 'Housewife' ? 'selected' : ''; ?>>Housewife
                                        </option>
                                        <option value="Working Professional" <?php echo $inquiryData && $inquiryData['profession'] == 'Working Professional' ? 'selected' : ''; ?>>
                                            Working Professional</option>
                                        <option value="Kids" <?php echo $inquiryData && $inquiryData['profession'] == 'Kids' ? 'selected' : ''; ?>>Kids</option>
                                        <option value="Other" <?php echo $inquiryData && $inquiryData['profession'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                                    </select>
                                </div>
                                <!-- Add Address Field -->
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address"
                                        value="<?php echo $inquiryData ? htmlspecialchars($inquiryData['address']) : ''; ?>">
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </form>
                        <button class="btn btn-primary" id="submitInquiry">Submit</button>
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
        $('#submitInquiry').click(function () {
            var formData = $('form').serialize();
            $.ajax({
                type: 'POST',
                url: 'studentrequest.php',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        alert("Student Details submitted successfully.");
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