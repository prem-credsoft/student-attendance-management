<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Attendance</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
<?php include('./header.php');?>

<!-- Database connection setup -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student-attendance-management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch students from database
$sql = "SELECT name FROM studentinfo";
$result = $conn->query($sql);
$students = [];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $students[] = $row['name'];
  }
} else {
  echo "0 results";
}
$conn->close();
?>

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
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Student Name</th>
            <?php
            $num_days = date('t'); // Number of days in the current month
            for ($i = 1; $i <= $num_days; $i++) {
              echo "<th>$i</th>";
            }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($students as $student) {
            echo "<tr><td>$student</td>";
            for ($i = 1; $i <= $num_days; $i++) {
              echo "<td></td>"; // Empty cells for attendance marks
            }
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>
  <!-- /.content -->
</div>

<?php include('./footer.php');?>
</body>
</html>