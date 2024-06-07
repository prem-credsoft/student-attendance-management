<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Attendance Records</title>
</head>

<body>
    <?php include ('./header.php'); ?>
    <?php require_once ('function.php'); ?>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Attendance Records</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Attendance Records</li>
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
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Attendance Status</h3>
                                <div class="ml-auto">
                                    <label for="filterDate">Date Filter:</label>
                                    <input type="date" id="filterDate" class="form-control d-inline-block mr-1"
                                        style="width: auto;">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Student Name</th>
                                                <th>Batch Name</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Mobile Number</th>
                                                <th>Reason</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT a.student_id, a.status, a.Reason, a.date, a.batch_id, s.name AS student_name, s.mobile_number, b.name AS batch_name 
                                            FROM attendance a 
                                            JOIN studentinfo s ON a.student_id = s.id 
                                            JOIN batch_table b ON a.batch_id = b.id";
                                            $attendanceRecords = executeQuery($sql);

                                            if ($attendanceRecords) {
                                                foreach ($attendanceRecords as $record) {
                                                    $statusText = '';
                                                    switch ($record['status']) {
                                                        case 0:
                                                            $statusText = 'Present';
                                                            break;
                                                        case 1:
                                                            $statusText = 'Absent';
                                                            break;
                                                        case 2:
                                                            $statusText = 'Leave';
                                                            break;
                                                    }

                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($record['student_id']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($record['student_name']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($record['batch_name']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($record['date']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($statusText) . "</td>";
                                                    echo "<td>" . htmlspecialchars($record['mobile_number']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($record['Reason']) . "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='7'>No records found.</td></tr>";
                                            }
                                            ?>
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

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#example1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <?php include ('./footer.php'); ?>