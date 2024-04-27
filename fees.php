<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Fees</title>
</head>

<?php
include ('./header.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Fees</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Fees</li>
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
              <h3 class="card-title">Fees Details</h3>
              <div class="card-tools">
                <a href="./feesform.php" class="btn btn-primary">Add New Fees</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>GR No.</th>
                    <th>Student Name</th>
                    <th>Amount Paid</th>
                    <th>Message</th>
                    <th>Payment Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once 'db.php'; // Adjust the path as necessary
                  $query = $db->query("SELECT r.id, r.student_id, s.student_name, r.amount, r.message, r.payment_date FROM receipt r JOIN studentinfo s ON r.student_id = s.id");
                  if (!$query) {
                    die("Error running query: " . $db->errorInfo()[2]);
                  }
                  $index = 1;
                  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['student_id'] . "</td>";
                    echo "<td>" . $row['student_name'] . "</td>";
                    echo "<td>" . $row['amount'] . "</td>";
                    echo "<td>" . $row['message'] . "</td>";
                    echo "<td>" . $row['payment_date'] . "</td>";
                    echo "<td><a href='#" . $row['id'] . "' class='btn btn-info'>Edit</a></td>";
                    echo "<td><a href='javascript:void(0);' onclick='confirmDelete(" . $row['id'] . ")' class='btn btn-danger'>Delete</a></td>";
                    echo "</tr>";
                  }
                  ?>
                </tbody>
              </table>
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

<script>
    function confirmDelete(id) {
        var confirmAction = confirm("Are you sure you want to delete this fees Details?");
        if (confirmAction) {
            window.location.href = 'fees_function.php?id=' + id;
        } else {
            // console.log('Deletion cancelled');
        }
    }
</script>
<?php include ('./footer.php'); ?>