<?php 
include('db.php'); 
include('function.php');

// Check for session message
if (isset($_SESSION['message'])) {
    echo "<script>alert('".$_SESSION['message']."');</script>";
    unset($_SESSION['message']); // Clear the message after displaying it
}

$message = ''; // Initialize an empty message string
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $batchName = $_POST['batchName'] ?? '';
    $facultyName = $_POST['facultyName'] ?? '';

    if (empty($batchName) || empty($facultyName)) {
        $message = "<script>alert('Both fields are required.');</script>";
    } else {
        $data = array('name' => $batchName, 'FacultyName' => $facultyName);
        $result = insertIntoTable('batch_table', $data);

        if ($result) {
            $_SESSION['message'] = "Batch added successfully.";
            header('Location: batch.php'); // Redirect to the same page to avoid form resubmission
            exit();
        } else {
            $_SESSION['message'] = "Failed to add batch.";
            header('Location: addbatch.php'); // Redirect to the same page to avoid form resubmission
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Add Batch</title>
</head>

<?php include('./header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add New Batch</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Batch</li>
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
                            <h3 class="card-title">Batch Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="addBatchForm" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="batchName">Batch Name</label>
                                    <input type="text" class="form-control" id="batchName" name="batchName" placeholder="Enter Batch Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="facultyName">Faculty Name</label>
                                    <input type="text" class="form-control" id="facultyName" name="facultyName" placeholder="Enter Faculty Name" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to add this batch?')">Submit</button>
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

<?php include('./footer.php'); ?>
</html>

<!-- <script>
document.getElementById('addBatchForm').addEventListener('submit', function(event) {
    if (!confirm('Are you sure you want to add this batch?')) {
        event.preventDefault(); // Prevent form submission if cancel is clicked
    }
});
</script> -->