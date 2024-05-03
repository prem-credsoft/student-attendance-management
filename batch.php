<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Students Details</title>
</head>


<?php include ('./header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">  
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Batch Details</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Batch Details</li>
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
              <h3 class="card-title">Batch List</h3>
              <!-- Add button here -->
              <div class="card-tools">
                <a href="./addbatch.php" class="btn btn-primary">Add New Batch</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Batch ID</th>
                      <th>Batch Name</th>
                      <th>Faculty Name</th>
                      <th>Attendance</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = $db->query("SELECT * FROM batch_table");
                    $index = 1;
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                      echo "<tr>";
                      echo "<td>Batch - " . $row['id'] . "</td>";
                      echo "<td>" . $row['name'] . "</td>";
                      echo "<td>" . $row['FacultyName'] . "</td>";
                      echo "<td><a href='javascript:void(0);' onclick='confirmAttendance(" . $row['id'] . ")' class='btn btn-success col-md-6'>Attendance</a></td>";
                      echo "<td><a href='editbatch.php?id=" . $row['id'] . "' class='btn btn-primary col-md-6'>Edit</a></td>";
                      echo "<td><a href='deletebatch.php?id=" . $row['id'] . "' class='btn btn-danger col-md-6' onclick='return confirm(\"Are you sure you want to delete this batch?\");'>Delete</a></td>";
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true
    });
  });

  function confirmAttendance(batchId) {
    if (confirm("Are you sure you want to manage attendance for this batch?")) {
      window.location.href = 'attendanceform.php?id=' + batchId;
    }
  }
</script>
<?php include ('./footer.php'); ?>
