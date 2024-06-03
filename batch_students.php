<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Batch Students</title>
</head>

<body>
    <div class="wrapper">

        <?php include ('./header.php'); ?>
        <?php require_once 'function.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Batch Students</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active">Batch Students</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <?php
                                    $batchId = isset($_GET['id']) ? intval($_GET['id']) : 0;
                                    $batchName = selectFromTable('batch_table', ['name'], ['id' => $batchId])[0]['name'] ?? 'Unknown Batch';
                                    ?>
                                    <h3 class="card-title">Students in
                                        <b><?php echo htmlspecialchars($batchName); ?></b>
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>GR No.</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Mobile Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $batchId = isset($_GET['id']) ? intval($_GET['id']) : 0;
                                            $students = selectFromTable('studentinfo', ['id', 'name', 'gender', 'mobile_number'], ['batch' => $batchId]);
                                            foreach ($students as $student) {
                                                echo "<tr>";
                                                echo "<td>RIE - " . htmlspecialchars($student['id']) . "</td>";
                                                echo "<td>" . htmlspecialchars($student['name']) . "</td>";
                                                echo "<td>" . htmlspecialchars($student['gender']) . "</td>";
                                                echo "<td>" . htmlspecialchars($student['mobile_number']) . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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
        <script>
            $(document).ready(function () {
                $('#example1').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": false,
                    "autoWidth": true,
                    "responsive": true
                });
            });
        </script>
        <?php include ('./footer.php'); ?>