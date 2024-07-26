<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Alumni Students</title>
</head>

<?php include ('./header.php');
require_once 'function.php';

// Check user status from session
$isSuperAdmin = isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'super_admin';
?>

<style>
.hide-column {
    display: none; /* Hide the column initially */
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Alumni Students</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Alumni Students</li>
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
              <h3 class="card-title">Alumni Students List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>GR No.</th>
                      <th>Student Name</th>
                      <th>Batch</th>
                      <th>Mobile Number</th>

                      <th class="hide-column">DOB</th>
                      <th class="hide-column">Gender</th>
                      <th class="hide-column">Aadharcard Number</th>
                      <th class="hide-column">Profession</th>
                      <th class="hide-column">Address</th>
                      <th class="hide-column">Reference</th>
                      <th class="hide-column">Joining Purpose</th>
                      <th class="hide-column">Extratime Daily</th>
                      <th class="hide-column">Gmail Id</th>
                      <th class="hide-column">Father Name</th>
                      <th class="hide-column">Father Number</th>
                      <th class="hide-column">Father Profession</th>
                      <th class="hide-column">Workplace Address</th>
                      <th class="hide-column">Mother Name</th>
                      <th class="hide-column">Home Number</th>
                      <th class="hide-column">Admission Time</th>
                      <th class="hide-column">Total Fees</th>
                      <th class="hide-column">Paid Fees</th>
                      <th class="hide-column">Pending Fees</th>
                      <th class="hide-column">Scholarship</th>

                      <th>Profiles</th>
                      <?php if ($isSuperAdmin): ?>
                        <th>Move To Student</th>
                        <th>Delete</th>
                      <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $rows = selectFromTable('studentinfo', 
                        ['id', 'name', 'batch', 'batch_name', 'pending_fees', 'mobile_number', 'dob', 'gender', 'aadharcard_number', 'profession', 'address', 'reference', 'joining_purpose', 'extratime_daily', 'gmail_id', 'father_name', 'father_number', 'father_profession', 'workplace_address', 'mother_name', 'home_number', 'admission_time', 'total_fees', 'paid_fees', 'pending_fees', 'discount'], 
                        ['alumnistudent' => 1]);
                    foreach ($rows as $row) {
                      echo "<tr>";
                      echo "<td>" . $row['id'] . "</td>";
                      echo "<td style='word-break: break-all;'>" . $row['name'] . "</td>";
                      echo "<td>" . $row['batch_name'] . "</td>";
                      echo "<td>" . $row['mobile_number'] . " <a href='tel:" . $row['mobile_number'] . "' class='btn btn-success ml-2'><i class='fas fa-phone'></i></a></td>";

                      echo "<td class='hide-column'>" . $row['dob'] . "</td>";
                      echo "<td class='hide-column'>" . $row['gender'] . "</td>";
                      echo "<td class='hide-column'>" . $row['aadharcard_number'] . "</td>";
                      echo "<td class='hide-column'>" . $row['profession'] . "</td>";
                      echo "<td class='hide-column'>" . $row['address'] . "</td>";
                      echo "<td class='hide-column'>" . $row['reference'] . "</td>";
                      echo "<td class='hide-column'>" . $row['joining_purpose'] . "</td>";
                      echo "<td class='hide-column'>" . $row['extratime_daily'] . "</td>";
                      echo "<td class='hide-column'>" . $row['gmail_id'] . "</td>";
                      echo "<td class='hide-column'>" . $row['father_name'] . "</td>";
                      echo "<td class='hide-column'>" . $row['father_number'] . "</td>";
                      echo "<td class='hide-column'>" . $row['father_profession'] . "</td>";
                      echo "<td class='hide-column'>" . $row['workplace_address'] . "</td>";
                      echo "<td class='hide-column'>" . $row['mother_name'] . "</td>";
                      echo "<td class='hide-column'>" . $row['home_number'] . "</td>";
                      echo "<td class='hide-column'>" . $row['admission_time'] . "</td>";
                      echo "<td class='hide-column'>" . $row['total_fees'] . "</td>";
                      echo "<td class='hide-column'>" . $row['paid_fees'] . "</td>";
                      echo "<td class='hide-column'>" . $row['pending_fees'] . "</td>";
                      echo "<td class='hide-column'>" . $row['discount'] . "</td>";

                      echo "<td><a href='javascript:void(0);' onclick='confirmProfile(" . $row['id'] . ")' class='btn btn-info'>Profile</a></td>";
                      if ($isSuperAdmin) {
                        echo "<td><a href='javascript:void(0);' onclick='confirmMoveToStudent(" . $row['id'] . ")' class='btn btn-secondary'>Move</a></td>";
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
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script>
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

  function confirmMoveToStudent(id) {
  var confirmAction = confirm("Are you sure you want to move this alumni to student?");
  if (confirmAction) {
    $.post('move_to_student.php', { student_id: id }, function(response) {
      alert(response.message);
      location.reload();
    }, 'json');
  }
}
</script>
<script>
  $(document).ready(function () {
    var columnSelector = ':not(:last-child)';
  <?php if ($isSuperAdmin): ?>
  columnSelector = ':lt(-3)';
  <?php endif; ?>

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true,
      "dom": 'Bfrtip',
      "buttons": [
        {
          extend: 'excelHtml5',
          title: 'Students Data',
          exportOptions: {
            columns: columnSelector
          }
        },
        {
          extend: 'pdfHtml5',
          title: 'Students Data',
          exportOptions: {
            columns: columnSelector
          }
        }
      ],
      "columnDefs": [
        { "orderable": false, "targets": [4, 5, 6] }
      ]
    });
  });
</script>
<?php include ('./footer.php'); ?>