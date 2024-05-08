<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Leaves</title>
</head>
<body>
<?php 
include('./header.php');
require_once('function.php');
require_once('db.php');

// Check if session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start session only if not already started
}

// Check user status from session
$isSuperAdmin = isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'super_admin';
$isAdmin = isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'admin';
$isFaculty = isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'faculty';

// Fetch leaves data
$leavesData = selectFromTable('leaves', ['id', 'student_id', 'reason', 'start_date', 'end_date', 'created_at'], []);
?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Leaves</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Leaves</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Leaves List</h3>
                  <div class="card-tools">
                    <a href="./leaveform.php" class="btn btn-primary">Add New Leave</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>GR No.</th>
                          <th>Student Name</th>
                          <th>Reason</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <?php if ($isSuperAdmin || $isAdmin): ?>
                          <th>Edit</th>
                          <?php endif; ?>
                          <?php if ($isSuperAdmin): ?>
                          <th>Delete</th>
                          <?php endif; ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($leavesData as $leave): ?>
                        <tr>
                          <td>RIE - <?php echo htmlspecialchars($leave['student_id']); ?></td>
                          <td><?php 
                              $student = selectFromTable('studentinfo', ['name'], ['id' => $leave['student_id']]);
                              echo htmlspecialchars($student[0]['name']);
                          ?></td>
                          <td><?php echo htmlspecialchars($leave['reason']); ?></td>
                          <td><?php echo htmlspecialchars($leave['start_date']); ?></td>
                          <td><?php echo htmlspecialchars($leave['end_date']); ?></td>
                          <?php if ($isSuperAdmin || $isAdmin): ?>
                          <td><a href="#" class="btn btn-primary btn-edit" data-id="<?php echo $leave['id']; ?>"><i class='fas fa-edit'></i></a></td>
                          <?php endif; ?>
                          <?php if ($isSuperAdmin): ?>
                          <td><a href="#" class="btn btn-danger btn-delete" data-id="<?php echo $leave['id']; ?>"><i class='fas fa-trash'></i></a></td>
                          <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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

    function confirmEdit(id) {
      var confirmAction = confirm("Are you sure you want to edit this leave details?");
      if (confirmAction) {
        window.location.href = 'leaveform.php?id=' + id;
      } else {
        // Edit cancelled
      }
    }

    function confirmDelete(id) {
    
      var confirmAction = confirm("Are you sure you want to delete this leave details?");
      if (confirmAction) {
        window.location.href = 'leave_function.php?id=' + id;
      } else {
        // Deletion cancelled
      }
    }

    // Attach confirmEdit function to edit buttons
    $('.btn-edit').on('click', function() {
      var leaveId = $(this).data('id');
      confirmEdit(leaveId);
    });

    // Attach confirmDelete function to delete buttons
    $('.btn-delete').on('click', function() {
      var leaveId = $(this).data('id');
      confirmDelete(leaveId);
    });
  });
</script>
<?php include('./footer.php'); ?>
</body>
</html>
