<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Students Details</title>
</head>

<?php
include ('./header.php');
require_once 'function.php';

// Check user status from session
$isSuperAdmin = isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'super_admin';
$isAdmin = isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'admin';
$isFaculty = isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'faculty';
?>

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
            <li class="breadcrumb-item">
              <?php if ($_SESSION['user_status'] === 'faculty'): ?>
                <a href="./batch.php">Home</a>
              <?php else: ?>
                <a href="./dashboard.php">Home</a>
              <?php endif; ?>
            </li>
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
              <?php if ($isSuperAdmin || $isAdmin): ?>
                <div class="card-tools">
                  <a href="./addbatch.php" class="btn btn-primary">Add New Batch</a>
                </div>
              <?php endif; ?>
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
                      <th>Batch Students</th>
                      <?php if ($isSuperAdmin || $isAdmin): ?>
                        <th>Edit</th>
                      <?php endif; ?>
                      <?php if ($isSuperAdmin): ?>
                        <th>Delete</th>
                      <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $batches = selectFromTable('batch_table', ['id', 'name', 'FacultyName'], []);
                    foreach ($batches as $row) {
                      echo "<tr>";
                      echo "<td>Batch - " . $row['id'] . "</td>";
                      echo "<td>" . $row['name'] . "</td>";
                      echo "<td>" . $row['FacultyName'] . "</td>";
                      echo "<td><a href='javascript:void(0);' onclick='confirmAttendance(" . $row['id'] . ")' class='btn btn-success col-md-12'>Attendance</a></td>";
                      echo "<td><a href='javascript:void(0);' onclick='confirmBatchStudents(" . $row['id'] . ")' class='btn btn-info col-md-12'>Batch Students</a></td>";
                      if ($isSuperAdmin || $isAdmin) {
                        echo "<td><a href='javascript:void(0);' onclick='confirmEdit(" . $row['id'] . ")' class='btn btn-primary'><i class='fas fa-edit'></i></a></td>";
                      }
                      if ($isSuperAdmin) {
                        echo "<td><a href='javascript:void(0);' onclick='confirmDelete(" . $row['id'] . ")' class='btn btn-danger'><i class='fas fa-trash'></i></a></td>";
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
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script>
  $(document).ready(function () {
    var buttonsConfig = [];
    <?php if (!$isFaculty): ?>
      buttonsConfig = [
        {
          extend: 'excelHtml5',
          title: 'Inquiry Data',
        },
        {
          extend: 'pdfHtml5',
          title: 'Inquiry Data',
        }
      ];
    <?php endif; ?>

    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true,
      "dom": 'Bfrtip',
      "buttons": buttonsConfig,
      "columnDefs": [
        { "orderable": false, "targets": [0, 3, 4, 5, 6] }
      ]
    });
  });

  function confirmAttendance(batchId) {
    if (confirm("Are you sure you want to manage attendance for this batch?")) {
      window.location.href = 'attendanceform.php?id=' + batchId;
    }
  }

  function confirmBatchStudents(batchId) {
    if (confirm("Are you sure you want to see batch students for this batch?")) {
      window.location.href = 'batch_students.php?id=' + batchId;
    }
  }

  function confirmEdit(batchId) {
    if (confirm("Are you sure you want to edit this batch?")) {
      window.location.href = 'editbatch.php?id=' + batchId;
    }
  }

  function confirmDelete(id) {
    var confirmAction = confirm("Are you sure you want to delete this Student Details?");
    if (confirmAction) {
      window.location.href = 'deletebatch.php?id=' + id;
    } else {
      // console.log('Deletion cancelled');
    }
  }
</script>
<?php include ('./footer.php'); ?>