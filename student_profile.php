<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Student Profile</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="wrapper">

    <?php include ('./header.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Student Profile</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Student Profile</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </div>

      <?php
      require_once 'function.php';

      // Get student ID from URL
      $studentId = isset($_GET['id']) ? intval($_GET['id']) : 0;

      // Fetch student information
      $studentInfo = selectFromTable('studentinfo', ['id', 'name', 'batch_name', 'father_name', 'mother_name', 'dob', 'gender', 'mobile_number', 'profession', 'address', 'admission_time', 'pending_fees', 'discount', 'total_fees', 'paid_fees', 'extratime_daily', 'joining_purpose', 'aadharcard_number', 'workplace_address', 'father_profession', 'reference', 'home_number', 'father_number', 'gmail_id'], ['id' => $studentId])[0];

      // Fetch total paid fees
      // $totalPaidFees = selectFromTable('receipt', ['SUM(amount) AS total_paid'], ['student_id' => $studentId]);
      // $totalPaidFees = $totalPaidFees[0]['total_paid'] ?? 0;
      
      // Fetch attendance records
      $attendanceRecords = selectFromTable('attendance', ['date', 'status', 'Reason', 'leave_status'], ['student_id' => $studentId]);

      // Initialize counters
      $presentCount = 0;
      $absentCount = 0;
      $leaveCount = 0;

      // Calculate counts
      foreach ($attendanceRecords as $record) {
        if ($record['status'] == 0) {
          $presentCount++;
        } elseif ($record['status'] == 1) {
          $absentCount++;
        } elseif ($record['leave_status'] == 1) {
          $leaveCount++;
        }
      }
      ?>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <!-- Personal Details Card -->
            <div class="card mb-3 h5">
              <div class="card-header bg-info text-white">Personal Details</div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <p><strong>GR No:</strong> RIE - <?php echo htmlspecialchars($studentInfo['id']); ?></p>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($studentInfo['name']); ?></p>
                    <p><strong>Batch:</strong> <?php echo htmlspecialchars($studentInfo['batch_name']); ?></p>
                    <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($studentInfo['dob']); ?></p>
                    <p><strong>Gender:</strong> <?php echo htmlspecialchars($studentInfo['gender']); ?></p>
                    <p><strong>Profession:</strong> <?php echo htmlspecialchars($studentInfo['profession']); ?></p>
                    <p><strong>Mobile Number:</strong> <?php echo htmlspecialchars($studentInfo['mobile_number']); ?>
                    </p>
                  </div>
                  <div class="col-md-6">
                    <p><strong>Address:</strong> <?php echo htmlspecialchars($studentInfo['address']); ?></p>
                    <p><strong>Admission Time:</strong> <?php echo htmlspecialchars($studentInfo['admission_time']); ?>
                    </p>
                    <p><strong>Extra Time Daily:</strong>
                      <?php echo htmlspecialchars($studentInfo['extratime_daily']); ?></p>
                    <p><strong>Joining Purpose:</strong>
                      <?php echo htmlspecialchars($studentInfo['joining_purpose']); ?></p>
                    <p><strong>Aadhar Card Number:</strong>
                      <?php echo htmlspecialchars($studentInfo['aadharcard_number']); ?></p>
                    <p><strong>Reference:</strong> <?php echo htmlspecialchars($studentInfo['reference']); ?></p>
                    <p><strong>Gmail ID:</strong> <?php echo htmlspecialchars($studentInfo['gmail_id']); ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <!-- Family Details Card -->
            <div class="card mb-3 h5">
              <div class="card-header bg-secondary text-white">Family Details</div>
              <div class="card-body">
                <p><strong>Father's Name:</strong> <?php echo htmlspecialchars($studentInfo['father_name']); ?></p>
                <p><strong>Mother's Name:</strong> <?php echo htmlspecialchars($studentInfo['mother_name']); ?></p>
                <p><strong>Father's Profession:</strong>
                  <?php echo htmlspecialchars($studentInfo['father_profession']); ?></p>
                <p><strong>Home Number:</strong> <?php echo htmlspecialchars($studentInfo['home_number']); ?></p>
                <p><strong>Father's Mobile Number:</strong>
                  <?php echo htmlspecialchars($studentInfo['father_number']); ?></p>
                <p><strong>Workplace Address:</strong>
                  <?php echo htmlspecialchars($studentInfo['workplace_address']); ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <!-- Financial Info Card -->
            <div class="card mb-3 h5">
              <div class="card-header bg-success text-white">Fees Information</div>
              <div class="card-body">
                <p><strong>Total Fees:</strong> <?php echo htmlspecialchars($studentInfo['total_fees']); ?>.00</p>
                <p><strong>Pending Fees:</strong> <?php echo htmlspecialchars($studentInfo['pending_fees']); ?>.00</p>
                <p><strong>Paid Fees:</strong> <?php echo htmlspecialchars($studentInfo['paid_fees']); ?>.00</p>
                <p><strong>Scholarship:</strong> <?php echo htmlspecialchars($studentInfo['discount']); ?>.00</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <!-- Attendance Summary Card -->
            <div class="card mb-3 h5">
              <div class="card-header bg-warning text-white">Attendance Summary</div>
              <div class="card-body">
                <p><strong>Presents:</strong> <?php echo $presentCount; ?></p>
                <p><strong>Absents:</strong> <?php echo $absentCount; ?></p>
                <p><strong>Leaves:</strong> <?php echo $leaveCount; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <!-- Leave Records Card -->
            <div class="card mb-3 h5">
              <div class="card-header bg-danger text-white">Leave Records</div>
              <div class="card-body">
                <div style="overflow-y: auto; max-height: 20vh; position: sticky; top: 0;"> <!-- Scrollable and sticky container -->
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th style="border: 1px solid black; position: sticky; top: 0; background-color: white;">Reason</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($attendanceRecords as $record): ?>
                        <?php if ($record['leave_status'] == 1): ?>
                          <tr>
                            <td><?php echo htmlspecialchars($record['date']); ?></td>
                            <td><?php echo htmlspecialchars($record['Reason']); ?></td>
                          </tr>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php include ('./footer.php'); ?>