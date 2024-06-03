<?php include ('./header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <?php
              require_once 'function.php';
              $result = selectFromTable('inquiryinfo', ['COUNT(*) AS total_inquiry'], []);
              $total_inquiry = $result[0]['total_inquiry'];
              ?>
              <h3><?php echo $total_inquiry; ?></h3>

              <p>Inquiry</p>
            </div>
            <div class="icon">
              <i class="ion ion-help"></i>
            </div>
            <a href="./inquiry.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              require_once 'function.php';
              $result = selectFromTable('studentinfo', ['COUNT(*) AS total_students'], []);
              $total_students = $result[0]['total_students'];
              ?>
              <h3><?php echo $total_students; ?></h3>
              <p>Students</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-contacts"></i>
            </div>
            <a href="./studentsdetails.php" class="small-box-footer">More info <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              require_once 'function.php';
              $result = selectFromTable('studentinfo', ['COUNT(*) AS total_receipt'], ['fee_status' => 0]);
              $total_receipt = $result[0]['total_receipt'];
              ?>
              <h3><?php echo $total_receipt; ?></h3>

              <p>Pending Fees</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="./pendingfees.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <?php
              require_once 'function.php';
              $result = selectFromTable('users', ['COUNT(*) AS total_status_two'], ['status' => 2]);
              $total_status_two = $result[0]['total_status_two'];
              ?>
              <h3><?php echo $total_status_two; ?></h3>

              <p>Faculty</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-contacts"></i>
            </div>
            <a href="./user_management.php" class="small-box-footer">More info <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-6">
          <div class="card mb-3 h5">
            <div class="card-header bg-danger text-white">Leave Records Pending</div>
            <div class="card-body">
              <div style="overflow-y: auto; max-height: 50vh; position: sticky; top: 0;">
                <!-- Scrollable and sticky container -->
                <table class="table">
                  <thead>
                    <tr>
                      <th class="border">Student</th>
                      <th class="border">Date</th>
                      <th class="border">Reason</th>
                      <th class="border">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    require_once 'function.php';

                    // Fetch attendance records with leave_status = 0, including the 'id' field
                    $attendanceRecords = selectFromTable('attendance', ['id', 'student_id', 'date', 'reason'], ['leave_status' => 0]);

                    // Fetch student names
                    $studentNames = [];
                    if ($attendanceRecords) {
                      $studentIds = array_column($attendanceRecords, 'student_id');
                      $studentNames = selectFromTable('studentinfo', ['id', 'name'], ['id' => $studentIds]);
                      $studentNames = array_column($studentNames, 'name', 'id');
                    }

                    foreach ($attendanceRecords as $record) {
                      ?>
                      <tr>
                        <td class="border"><?php echo htmlspecialchars($studentNames[$record['student_id']] ?? ''); ?>
                        </td>
                        <td class="border"><?php echo htmlspecialchars($record['date']); ?></td>
                        <td class="border"><?php echo htmlspecialchars($record['reason']); ?></td>
                        <td class="border">
                          <input type="radio" name="action[<?php echo $record['id']; ?>]" value="1"
                            data-attendance-id="<?php echo $record['id']; ?>"> Accept
                          <input type="radio" name="action[<?php echo $record['id']; ?>]" value="2"
                            data-attendance-id="<?php echo $record['id']; ?>"> Reject
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card mb-3 h5">
            <div class="card-header bg-success text-white">Leave Records Status</div>
            <div class="card-body">
              <div style="overflow-y: auto; max-height: 50vh; position: sticky; top: 0;">
                <!-- Scrollable and sticky container -->
                <table class="table">
                  <thead>
                    <tr>
                      <th class="border">Student</th>
                      <th class="border">Date</th>
                      <th class="border">Reason</th>
                      <th class="border">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    require_once 'function.php';

                    // Fetch attendance records with leave_status = 1 or 2
                    $attendanceRecords = selectFromTable('attendance', ['id', 'student_id', 'date', 'reason', 'leave_status'], ['leave_status' => [1, 2]]);

                    // Fetch student names
                    $studentNames = [];
                    if ($attendanceRecords) {
                      $studentIds = array_column($attendanceRecords, 'student_id');
                      $studentNames = selectFromTable('studentinfo', ['id', 'name'], ['id' => $studentIds]);
                      $studentNames = array_column($studentNames, 'name', 'id');
                    }
                    ?>
                    <?php foreach ($attendanceRecords as $record): ?>
                        <tr>
                            <td class="border"><?php echo htmlspecialchars($studentNames[$record['student_id']] ?? 'Unknown'); ?></td>
                            <td class="border"><?php echo htmlspecialchars($record['date']); ?></td>
                            <td class="border"><?php echo htmlspecialchars($record['reason']); ?></td>
                            <td class="border"><?php echo $record['leave_status'] == 1 ? 'Accepted' : 'Rejected'; ?></td>
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
    <!-- /.container-fluid -->
  </section>
  <!-- right col -->
</div>
<!-- /.row (main row) -->

<?php include ('./footer.php'); ?>

</body>

</html>

<script>
  $(document).ready(function () {
    $('input[type="radio"]').on('change', function () {
      var attendanceId = $(this).data('attendance-id');
      var actionValue = $(this).val(); // Should be '1' for Accept and '2' for Reject

      $.ajax({
        url: 'leave_records_status.php',
        type: 'POST',
        data: {
          attendance_id: attendanceId,
          action: actionValue
        },
        dataType: 'json',
        success: function (response) {
          // alert(response.message);
          if (response.success) {
            location.reload(); // Reload the page to reflect the changes
          }
        },
        error: function () {
          alert('Error updating record.');
        }
      });
    });
  });
</script>