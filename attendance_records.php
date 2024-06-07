<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Attendance Details</title>
</head>

<?php include ('./header.php');
require_once 'function.php';

// Check user status from session
$isSuperAdmin = isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'super_admin';

// Initialize date filter variables
$startDate = $_GET['start_date'] ?? date('Y-m-d'); // default start date is the first day of the current month
$endDate = $_GET['end_date'] ?? date('Y-m-d'); // default end date is today

// Fetch attendance details with date filter
$query = "
    SELECT a.student_id, si.name, si.batch_name, si.mobile_number, a.reason, a.date, a.status, a.leave_status
    FROM attendance a
    JOIN studentinfo si ON a.student_id = si.id
    WHERE a.date BETWEEN ? AND ?
";
$attendanceRecords = $db->prepare($query);
$attendanceRecords->execute([$startDate, $endDate]);
$attendanceRecords = $attendanceRecords->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Attendance Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Attendance Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Attendance Records</h3>
                            <div class="card-tools">
                                <form method="GET">
                                    <input type="date" id="start_date" name="start_date"
                                        value="<?= htmlspecialchars($startDate) ?>">
                                    <b>TO</b>
                                    <input type="date" id="end_date" name="end_date"
                                        value="<?= htmlspecialchars($endDate) ?>">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Batch Name</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Reason</th>
                                            <th>Mobile Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($attendanceRecords as $record): ?>
                                            <tr>
                                                <td><?php echo $record['student_id']; ?></td>
                                                <td><?php echo $record['name']; ?></td>
                                                <td><?php echo htmlspecialchars($record['batch_name']); ?>
                                                <td><?php echo date('Y-m-d', strtotime($record['date'])); ?></td>
                                                <td>
                                                    <?php
                                                    if ($record['status'] == 0) {
                                                        echo 'Present';
                                                    } elseif ($record['status'] == 1) {
                                                        echo 'Absent';
                                                    } elseif ($record['status'] == 4) {
                                                        echo 'Leave - Rejected';
                                                    } elseif ($record['leave_status'] == 0) {
                                                        echo 'Leave - Pending';
                                                    } else {
                                                        echo 'Leave';
                                                    }
                                                    ?>
                                                    <td><?php echo $record['status'] == 2 ? htmlspecialchars($record['reason']) : 'N/A'; ?></td>
                                                    <td><?php echo htmlspecialchars($record['mobile_number']); ?> <a href="tel:<?php echo htmlspecialchars($record['mobile_number']); ?>" class="btn btn-success"><i class="fas fa-phone"></i></a></td>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "responsive": true,
            "dom": 'Bfrtip',
            "buttons": [
                {
                    extend: 'excelHtml5',
                    title: 'Attendance Data',
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Attendance Data',
                }
            ]
        });
    });
</script>
<?php include ('./footer.php'); ?>