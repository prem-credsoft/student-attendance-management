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
  <?php include ('./header.php'); ?>
  <?php include ('db.php'); ?>
  <?php include ('function.php'); ?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Attendance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Attendance</li>
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
                <h3 class="card-title">Student Attendance</h3>
                <!-- Add button here -->
                <div class="card-tools">
                  <div>Date: <?php echo date("d-m-Y"); ?></div>
                </div>
              </div>
              <div class="card-body">
                <form id="attendanceForm" method="post">
                  <div class="table-responsive">
                    <table id="attendanceTable" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th class="pl-5">GR No.</th>
                          <th class="pl-5">Student Name</th>
                          <?php
                          $num_days = date('t');
                          for ($i = 1; $i <= $num_days; $i++) {
                            $date = date('Y-m-d', strtotime(date('Y-m-') . sprintf('%02d', $i)));
                            echo "<th>$date</th>";
                          }
                          ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $batchId = isset($_GET['id']) ? $_GET['id'] : 0;
                        $students = selectFromTable('studentinfo', ['id', 'name'], ['batch' => $batchId]);
                        foreach ($students as $student):
                          echo "<tr>";
                          echo "<td>RIE - {$student['id']}</td>";
                          echo "<td>{$student['name']}</td>";
                          for ($i = 1; $i <= $num_days; $i++) {
                            $date = date('Y-m-d', strtotime(date('Y-m-') . sprintf('%02d', $i)));
                            echo "<td class='pr-5'>";
                            echo "<input type='radio' name='status[{$student['id']}][$date]' value='0'> Present";
                            echo "<input type='radio' name='status[{$student['id']}][$date]' value='1'> Absent";
                            echo "<input type='radio' name='status[{$student['id']}][$date]' value='2'> Leave";
                            echo "</td>";
                          }
                          echo "</tr>";
                        endforeach;
                        ?>
                      </tbody>
                    </table>
                  </div>
                </form>
                <button class="btn btn-primary">Submit Attendance</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#attendanceTable').DataTable({
        "paging": false,
        "lengthChange": true,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "responsive": true
      });

      $('#attendanceForm').submit(function (event) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
          url: 'attendancerequest.php',
          type: 'POST',
          data: formData,
          success: function(response) {
            alert('Attendance updated successfully');
          },
          error: function() {
            alert('Error updating attendance');
          }
        });
      });
    });
  </script>
  <?php include ('./footer.php'); ?>