<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Attendance</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <style>
    .status-present,
    .status-absent,
    .status-leave,
    .status {
      font-size: 20px;
    }

    .status-present {
      color: green;
      font-weight: bold;
    }

    .status-absent {
      color: red;
      font-weight: bold;
    }

    .status-leave {
      color: blue;
      font-weight: bold;
    }

    .status {
      color: gray;
      font-weight: bold;
    }
  </style>
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
                <div class="card-tools">
                  <div>Date: <?php echo date("d-m-Y"); ?></div>
                </div>
              </div>
              <div class="card-body">
                <form id="attendanceForm" method="post">
                  <input type="hidden" name="batch_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>">
                  <input type="hidden" name="current_date" value="<?php echo date("Y-m-d"); ?>">
                  <div class="table-responsive">
                    <table id="attendanceTable" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th class="pl-5">GR No.</th>
                          <th class="pl-5">Student Name</th>
                          <?php
                          $num_days = date('t');
                          for ($i = 1; $i <= $num_days; $i++) {
                            $date = date('D-d', strtotime(date('Y-m-') . sprintf('%02d', $i)));
                            echo "<th>$date</th>";
                          }
                          ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $currentDate = date('Y-m-d');
                        $batchId = isset($_GET['id']) ? $_GET['id'] : 0;
                        $students = selectFromTable('studentinfo', ['id', 'name'], ['batch' => $batchId]);
                        foreach ($students as $student):
                          echo "<tr>";
                          echo "<td>RIE - {$student['id']}</td>";
                          echo "<td>{$student['name']}</td>";
                          for ($i = 1; $i <= $num_days; $i++) {
                            $date = date('Y-m-d', strtotime(date('Y-m-') . sprintf('%02d', $i)));
                            $attendance = selectFromTable('attendance', ['status'], ['student_id' => $student['id'], 'date' => $date]);
                            $status = $attendance ? $attendance[0]['status'] : -1; // Default to -1 if no entry
                            echo "<td class='pr-5'>";
                            if ($date < $currentDate) {
                              switch ($status) {
                                case 0:
                                  echo "<div class='status-present'>Present</div>";
                                  break;
                                case 1:
                                  echo "<div class='status-absent'>Absent</div>";
                                  break;
                                case 2:
                                  echo "<div class='status-leave'>Leave</div>";
                                  break;
                                default:
                                  echo "<div class='status'>N/A</div>";
                                  break;
                              }
                            } elseif ($date == $currentDate) {
                              echo "<div style='display: flex;'>";
                              echo "<div><input type='radio' class='attendance-checkbox' data-student-id='{$student['id']}' name='status[{$student['id']}][$date]' value='0' " . ($status == 0 ? "checked" : "") . "><Label class='pr-3'>PR</Label></div>";
                              echo "<div><input type='radio' class='attendance-checkbox' data-student-id='{$student['id']}' name='status[{$student['id']}][$date]' value='1' " . ($status == 1 ? "checked" : "") . "><Label class='pr-3'>AB</Label></div>";
                              echo "<div><input type='radio' class='attendance-checkbox' data-student-id='{$student['id']}' name='status[{$student['id']}][$date]' value='2' " . ($status == 2 ? "checked" : "") . "><Label class='pr-3'>LE</Label></div>";
                              echo "</>";
                            } else {
                              // echo "<div class='status'>N/A</div>";
                            }
                            echo "</td>";
                          }
                          echo "</tr>";
                        endforeach;
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <button type="button" id="submitAttendance" class="btn btn-primary mt-3">Submit Attendance</button>
                </form>

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

      // Handle checkbox changes
      $('.attendance-checkbox').change(function () {
        var studentId = $(this).data('student-id');
        var status = $(this).val();
        var currentDate = new Date().toISOString().slice(0, 10);
        var batchId = $('input[name="batch_id"]').val();
        // console.log("Student ID: " + studentId + ", Status: " + status + ", Date: " + currentDate + ", Batch ID: " + batchId);
      });

      $('#submitAttendance').click(function () {
        var attendanceData = {};
        $('.attendance-checkbox:checked').each(function () {
          var studentId = $(this).data('student-id');
          var status = $(this).val();
          var date = $(this).attr('name').match(/\[(\d{4}-\d{2}-\d{2})\]/)[1]; // Extract date from name attribute
          if (!attendanceData[studentId]) {
            attendanceData[studentId] = {};
          }
          attendanceData[studentId][date] = status;
        });

        var batchId = $('input[name="batch_id"]').val();
        var currentDate = new Date().toISOString().slice(0, 10);

        // Send data via AJAX to attendancerequest.php
        $.ajax({
          url: 'attendancerequest.php',
          type: 'POST',
          data: {
            batch_id: batchId,
            status: attendanceData
          },
          success: function (response) {
            alert('Attendance submitted successfully');
            // console.log(response);
          },
          error: function () {
            alert('Error submitting data');
          }
        });
      });
    });
  </script>
  <?php include ('./footer.php'); ?>
</body>

</html>