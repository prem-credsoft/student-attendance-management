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

    .sticky-table {
      position: sticky;
      top: 0;
      z-index: 1000;
      background-color: white;
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

    .table1{
      margin-top: 6px;
    }

    .table1 tr, .table2 tr{
      height: 90px;
    }
    @media screen and (max-width: 580px) {
      .a_list_head{
        flex-direction: column;
        align-items: flex-start !important;
      }
      .a_column_100{
        width:100px;
      }
    }

  </style>
</head>

<body>
  <?php include_once ('./header.php'); ?>
  <?php include_once ('db.php'); ?>
  <?php include_once ('function.php'); ?>

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
              <div class="card-header d-flex justify-content-between align-items-center a_list_head">
                <h3 class="card-title">
                  <?php
                  $batchId = isset($_GET['id']) ? $_GET['id'] : 0;
                  $batchDetails = selectFromTable('batch_table', ['name'], ['id' => $batchId]);
                  $batchName = $batchDetails ? $batchDetails[0]['name'] : 'Unknown Batch';
                  echo "<strong>Batch Name:</strong> " . $batchName . "";
                  ?>
                </h3>
                <div class="card-tools">
                  <div><span class="text-bold">Date:</span> <?php echo date("d-m-Y"); ?></div>
                </div>
              </div>
              <div class="card-body p-3">
                <form id="attendanceForm" method="post">
                  <input type="hidden" name="batch_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>">
                  <input type="hidden" name="current_date" value="<?php echo date("Y-m-d"); ?>">
                  <div class="table-responsive">
                    <table id="combinedTable" class="table table-bordered table-striped" style="margin-top:0px !important;">
                      <thead>
                        <tr>
                          <th class="p-1">GR No.</th>
                          <th class="p-1">Student Name</th>
                          <th class="p-1"><?php echo date('D-d', strtotime(date('Y-m-d'))); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $currentDate = date('Y-m-d');
                        $students = selectFromTable('studentinfo', ['id', 'name'], ['batch' => $batchId , 'alumnistudent' => 0]);
                        foreach ($students as $student) :
                          $attendance = selectFromTable('attendance', ['status', 'reason'], ['student_id' => $student['id'], 'date' => $currentDate]);
                          $status = $attendance ? $attendance[0]['status'] : -1; // Default to -1 if no entry
                          $reason = $attendance && $status == 2 ? htmlspecialchars($attendance[0]['reason']) : ''; // Fetch reason if status is 'Leave'
                          echo "<tr>";
                          echo "<td class='p-1 a_column_100'>{$student['id']}</td>";
                          echo "<td class='p-1 a_column_100'>{$student['name']}</td>";
                          echo "<td class='p-1'>";
                          echo "<div style='display: flex;'>";
                          echo "<div><input type='radio' class='attendance-checkbox' data-student-id='{$student['id']}' name='status[{$student['id']}][$currentDate]' value='0' " . ($status == 0 ? "checked" : "") . "><Label class='pl-1 pr-2'>PR</Label></div>";
                          echo "<div><input type='radio' class='attendance-checkbox' data-student-id='{$student['id']}' name='status[{$student['id']}][$currentDate]' value='1' " . ($status == 1 ? "checked" : "") . "><Label class='pl-1 pr-2'>AB</Label></div>";
                          echo "<div><input type='radio' class='attendance-checkbox' data-student-id='{$student['id']}' name='status[{$student['id']}][$currentDate]' value='2' " . ($status == 2 ? "checked" : "") . "><Label class='pl-1 pr-2'>LE</Label></div>";
                          echo "</div>";
                          echo "</td>";
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
      $('#combinedTable').DataTable({
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
            window.location.href = 'batch.php';
            // console.log(response);
          },
          error: function () {
            alert('Error submitting data');
          }
        });
      });

      // Tooltip for showing leave reasons
      $('.status-leave').hover(function() {
        var reason = $(this).data('reason');
        $(this).attr('title', reason); // Using native tooltips, but you can use custom tooltip libraries
      });

      // Alternatively, for a click event to show a more styled popup
      $('.status-leave').click(function() {
        var reason = $(this).data('reason');
        alert('Leave Reason: ' + reason); // Replace this with a modal if needed
      });
    });
  </script>
  <?php include ('./footer.php'); ?>
</body>

</html>