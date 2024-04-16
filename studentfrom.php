<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Student From</title>
</head>


<?php include ('./header.php'); ?>
<?php
include ('./db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['studentName']; // changed from 'student_name'
    $batch = $_POST['batch'];
    $father_name = $_POST['fatherName']; // changed from 'father_name'
    $mother_name = $_POST['motherName']; // changed from 'mother_name'
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $mobile_number = $_POST['mobileNumber']; // changed from 'mobile_number'
    $fee_status = $_POST['feeStatus']; // changed from 'fee_status'
    $admission_time = date('Y-m-d');

    // Prepare SQL query
    $query = $db->prepare("INSERT INTO studentinfo (student_name, batch, father_name, mother_name, dob, gender, mobile_number, fee_status, admission_time) 
    VALUES (:student_name, :batch, :father_name, :mother_name, :dob, :gender, :mobile_number, :fee_status, :admission_time)");

    // Bind parameters
    $query->bindParam(':student_name', $student_name);
    $query->bindParam(':batch', $batch);
    $query->bindParam(':father_name', $father_name);
    $query->bindParam(':mother_name', $mother_name);
    $query->bindParam(':dob', $dob);
    $query->bindParam(':gender', $gender);
    $query->bindParam(':mobile_number', $mobile_number);
    $query->bindParam(':fee_status', $fee_status);
    $query->bindParam(':admission_time', $admission_time);

    if ($query->execute()) {
        echo "<script>alert('Enquiry submitted successfully.');</script>";
    } else {
        echo "<script>alert('Failed to submit enquiry.');</script>";
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
                                        placeholder="Enter Student Name">
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
                                            <select class="form-control" id="gender" name="gender">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobileNumber">Mobile Number</label>
                                            <input type="tel" class="form-control" id="mobileNumber" maxlength="10"
                                                name="mobileNumber" placeholder="Mobile Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="feeStatus">Fee Status</label>
                                            <select class="form-control" id="feeStatus" name="feeStatus">
                                                <option>Paid</option>
                                                <option>Unpaid</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
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

<?php include ('./footer.php'); ?>