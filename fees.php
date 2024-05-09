<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Fees Receipt</title>
</head>

<?php include ('./header.php');
require_once 'function.php';

// Check user status from session
$isSuperAdmin = isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'super_admin';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Fees Receipt</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Fees Receipt</li>
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
                <a href="./feesform.php" class="btn btn-primary">Add New Fees Receipt</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>GR No.</th>
                      <th>Student Name</th>
                      <th>Amount Paid</th>
                      <th>Message</th>
                      <th>Payment Date</th>
                      <th>Edit</th>
                      <?php if ($isSuperAdmin): ?>
                        <th>Delete</th>
                      <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // require_once 'function.php';
                    $results = selectFromTable('receipt r JOIN studentinfo s ON r.student_id = s.id', ['r.id', 'r.student_id', 's.name', 'r.amount', 'r.message', 'r.payment_date'], []);
                    if (!$results) {
                      die("Error running query.");
                    }
                    foreach ($results as $row) {
                      echo "<tr>";
                      echo "<td> RIE - " . $row['student_id'] . "</td>";
                      echo "<td>" . $row['name'] . "</td>";
                      echo "<td>" . $row['amount'] . "</td>";
                      echo "<td>" . $row['message'] . "</td>";
                      echo "<td>" . $row['payment_date'] . "</td>";
                      echo "<td><a href='javascript:void(0);' onclick='confirmEdit(" . $row['id'] . ")' class='btn btn-primary'><i class='fas fa-edit'></i></a></td>";
                      if ($isSuperAdmin) {
                        echo "<td><a href='javascript:void(0);' onclick='confirmDelete(" . $row['id'] . ")' class='btn btn-danger'><i class='fas fa-trash'></a></td>";
                      }
                      echo "</tr>";
                    }
                    // Calculate pending fees and update studentinfo table
                    $students = selectFromTable('studentinfo', ['id', 'name'], []);
                    foreach ($students as $student) {
                      $totalPaidResults = selectFromTable('receipt', ['SUM(amount) AS total_paid'], ['student_id' => $student['id']]);
                      $totalPaid = $totalPaidResults[0]['total_paid'] ?? 0;
                      $pendingFees = 9800 - $totalPaid;
                      updateTable('studentinfo', ['pending_fees' => $pendingFees], ['id' => $student['id']]);
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
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

<script>
  function confirmEdit(id) {
    var confirmAction = confirm("Are you sure you want to edit this fees receipt?");
    if (confirmAction) {
      window.location.href = 'feesform.php?id=' + id;
    } else {
      // console.log('Edit cancelled');
    }
  }
</script>

<script>
  $(document).ready(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true,
      "responsive": true
    });
  });
</script>
<?php include ('./footer.php'); ?>