<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Fees</title>
</head>

<?php
include ('./header.php');
require_once ('db.php');

try {
  $stmt = $db->query("SELECT r.student_id, s.student_name, r.amount, r.message, r.payment_date FROM receipt r JOIN studentinfo s ON r.student_id = s.id");
  $feesDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("Could not connect to the database :" . $e->getMessage());
}
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
                  <?php foreach ($feesDetails as $detail): ?>
                    <tr>
                      <td><?php echo htmlspecialchars($detail['student_id']); ?></td>
                      <td><?php echo htmlspecialchars($detail['student_name']); ?></td>
                      <td><?php echo htmlspecialchars($detail['amount']); ?></td>
                      <td><?php echo htmlspecialchars($detail['message']); ?></td>
                      <td><?php echo htmlspecialchars($detail['payment_date']); ?></td>
                      echo "<td><a href='#" . $row['id'] . "' class='btn btn-info'>Edit</a></td>";
                      echo "<td><a href='#" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";
                    </tr>
                  <?php endforeach; ?>
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

<?php include ('./footer.php'); ?>