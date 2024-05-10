<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Students Details</title>
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
          <h1 class="m-0">Students Details</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Students Details</li>
          </ol>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Students List</h3>
              <!-- Add button here -->
              <div class="card-tools">
                <a href="./studentform.php" class="btn btn-primary">Add New Student</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>GR No.</th>
                      <th>Student Name</th>
                      <th>Batch</th>
                      <!-- <th>Pending Fees</th> -->
                      <th>Mobile Number</th>
                      <th>Profiles</th>
                      <th>Edit</th>
                      <?php if ($isSuperAdmin): ?>
                        <th>Delete</th>
                      <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // require_once 'function.php';
                    $rows = selectFromTable('studentinfo', ['id', 'name', 'batch', 'batch_name', 'pending_fees', 'mobile_number'], []);
                    foreach ($rows as $row) {
                      echo "<tr>";
                      echo "<td> RIE - " . $row['id'] . "</td>";
                      echo "<td>" . $row['name'] . "</td>";
                      echo "<td>" . $row['batch_name'] . "</td>";
                      // echo "<td>" . $row['pending_fees'] . ".00</td>";
                      echo "<td>" . $row['mobile_number'] . "</td>";
                      echo "<td><a href='javascript:void(0);' onclick='confirmProfile(" . $row['id'] . ")' class='btn btn-info'>Profile</a></td>";
                      echo "<td><a href='javascript:void(0);' onclick='confirmEdit(" . $row['id'] . ")' class='btn btn-primary'><i class='fas fa-edit'></i></a></td>";
                      if ($isSuperAdmin) {
                        echo "<td><a href='javascript:void(0);' onclick='confirmDelete(" . $row['id'] . ")' class='btn btn-danger'><i class='fas fa-trash'></a></td>";
                      }
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
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
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

  function confirmProfile(id) {
    var confirmAction = confirm("Are you sure you want to see this Student Profile?");
    if (confirmAction) {
      window.location.href = 'student_profile.php?id=' + id;
    }
  }

  function confirmEdit(id) {
    var confirmAction = confirm("Are you sure you want to edit this Student Details?");
    if (confirmAction) {
      window.location.href = 'studentform.php?id=' + id;
    }
  }

  function confirmDelete(id) {
    var confirmAction = confirm("Are you sure you want to delete this Student Details?");
    if (confirmAction) {
      window.location.href = 'student_function.php?id=' + id;
    }
  }
</script>
<?php include ('./footer.php'); ?>