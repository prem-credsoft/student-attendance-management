<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Enquirie From</title>
</head>


<?php include ('./header.php'); ?>
<?php
include ('./db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $reference = $_POST['reference'];
    $address = $_POST['address'];
    $mobileNumber = $_POST['mobileNumber'];
    $timeOfClasses = $_POST['timeOfClasses'];
    $profession = $_POST['profession'];
    $date = date('Y-m-d');

    // Prepare SQL query
    $query = $db->prepare("INSERT INTO enquirieinfo (name, reference, address, mobile_number, time_of_classes, profession, date) 
    VALUES (:name, :reference, :address, :mobile_number, :time_of_classes, :profession, :date)");

    // Bind parameters
    $query->bindParam(':name', $name);
    $query->bindParam(':reference', $reference);
    $query->bindParam(':address', $address);
    $query->bindParam(':mobile_number', $mobileNumber);
    $query->bindParam(':time_of_classes', $timeOfClasses);
    $query->bindParam(':profession', $profession);
    $query->bindParam(':date', $date);

    // Execute and respond
    if ($query->execute()) {
        echo "<script>alert('Enquiry submitted successfully.');</script>";
    } else {
        echo "<script>alert('Failed to submit enquiry.');</script>";
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
                    <h1 class="m-0">Enquirie From</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Enquirie From</li>
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
                            <h3 class="card-title">Enquirie Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="enquiryForm" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Name" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="reference">Reference</label>
                                            <select class="form-control" id="reference" name="reference">
                                                <option value="Internet">Internet</option>
                                                <option value="Friend">Friend</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobileNumber">Mobile Number</label>
                                            <input type="text" class="form-control" id="mobileNumber"
                                                name="mobileNumber" placeholder="Enter Mobile Number" maxlength="10" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="timeOfClasses">Time of Classes</label>
                                            <input type="text" class="form-control" id="timeOfClasses"
                                                name="timeOfClasses" placeholder="Enter Time of Classes" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="profession">Profession</label>
                                            <select class="form-control" id="profession" name="profession">
                                                <option value="Student">Student</option>
                                                <option value="Professional">Professional</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
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

<!-- <script>
    document.getElementById('enquiryForm').addEventListener('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        fetch('', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                alert('Enquiry submitted successfully.');
            })
            .catch(error => {
                alert('Failed to submit enquiry.');
                console.error('Error:', error);
            });
    });
</script> -->
<?php include ('./footer.php'); ?>