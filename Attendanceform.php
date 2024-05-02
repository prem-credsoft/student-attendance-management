<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Attendance</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>

<body>
<?php include('./header.php');?>

<!-- Include the database connection from db.php -->
<?php include('db.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Attendance</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Attendance</li>
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
              <h3 class="card-title">Student Attendance</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="attendanceTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Student Name</th>
                      <?php
                      $num_days = date('t'); // Number of days in the current month
                      $current_year = date('Y');
                      $current_month = date('m');
                      for ($i = 1; $i <= $num_days; $i++) {
                        $date = sprintf('%02d-%02d-%04d', $i, $current_month, $current_year);
                        echo "<th>$date</th>";
                      }
                      ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // Ensure $conn is defined
                    if (isset($conn) && $conn instanceof mysqli) {
                        // Fetch students from the database
                        $result = $conn->query("SELECT name FROM studentinfo");
                        if ($result) {
                            $students = $result->fetch_all(MYSQLI_ASSOC);

                            foreach ($students as $student) {
                              echo "<tr><td>{$student['name']}</td>";
                              for ($i = 1; $i <= $num_days; $i++) {
                                echo "<td></td>"; // Empty cells for attendance marks
                              }
                              echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='" . ($num_days + 1) . "'>No data available</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='" . ($num_days + 1) . "'>Database connection not available</td></tr>";
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
    $('#attendanceTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true
    });
  });
</script>
<?php include('./footer.php');?>
</body>
</html>
