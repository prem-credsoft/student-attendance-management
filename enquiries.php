<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Enquiries</title>
</head>

<?php include('./header.php');?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Enquiries</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Enquiries</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Enquiries List</h3>
                            <!-- Add button here -->
                            <div class="card-tools">
                                <a href="enquiriefrom.php" class="btn btn-primary">Add New Enquiry</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Reference</th>
                                        <th>Mobile Number</th>
                                        <th>Address</th>
                                        <th>Time of Classes</th>
                                        <th>Profession</th>
                                        <th>Date of Enquirie</th>
                                        <th>Add</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require_once 'db.php'; // Adjust the path as necessary
                                    $query = $db->query("SELECT * FROM enquirieinfo");
                                    if(!$query) {
                                        die("Error running query: " . $db->errorInfo()[2]);
                                    }
                                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['reference'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>" . $row['mobile_number'] . "</td>";
                                        echo "<td>" . $row['time_of_classes'] . "</td>";
                                        echo "<td>" . $row['profession'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td><a href='#" . $row['id'] . "' class='btn btn-info'>Add</a></td>";
                                        echo "<td><a href='javascript:void(0);' onclick='confirmDelete(" . $row['id'] . ")' class='btn btn-danger'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<link href="https://cdn.jsdelivr.net/npm/toastr/build/toastr.min.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr/build/toastr.min.js"></script>
<script>
    function confirmDelete(id) {
        var confirmAction = confirm("Are you sure you want to delete this enquiry?");
        if (confirmAction) {
            window.location.href = 'delete_enquiry.php?id=' + id;
        } else {
            console.log('Deletion cancelled');
        }
    }
</script>
<?php include('./footer.php');?>
