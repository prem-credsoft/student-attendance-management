<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Inquiry</title>
</head>

<?php include('./header.php');
require_once 'function.php';

// Check user status from session
$isSuperAdmin = isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'super_admin';

// Handle date filter
$startDate = $_GET['start_date'] ?? date('Y-m-d', strtotime('-30 days')); // Default to last 30 days if not set
$endDate = $_GET['end_date'] ?? date('Y-m-d'); // Default to today if not set

// Ensure the start date is not later than the end date
if (strtotime($startDate) > strtotime($endDate)) {
    $startDate = $endDate;
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Inquiry</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Inquiry</li>
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
                            <h3 class="card-title mb-2">Inquiry List</h3>
                            <!-- Date filter form -->
                            <form method="GET" class="card-tools">
                                <label>Filter:</label>
                                <input type="date" id="start_date" name="start_date" value="<?= htmlspecialchars($startDate) ?>" max="<?= date('Y-m-d') ?>">
                                <b>TO</b>
                                <input class="mb-2" type="date" id="end_date" name="end_date" value="<?= htmlspecialchars($endDate) ?>" max="<?= date('Y-m-d') ?>">
                                <a href="./inquiryform.php" class="btn btn-primary mb-2 ml-5">Add New Inquiry</a>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Reference</th>
                                        <th>Mobile Number</th>
                                        <th>Address</th>
                                        <th>Preference time of classes</th>
                                        <th>Profession</th>
                                        <th>Date of Inquiry</th>
                                        <th>Add</th>
                                        <?php if ($isSuperAdmin): ?>
                                        <th>Delete</th>
                                        <?php endif; ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $rows = selectFromTable('inquiryinfo', ['id', 'name', 'reference', 'mobile_number', 'address', 'time_of_classes', 'profession', 'date'], []);
                                    foreach ($rows as $row) {
                                        echo "<tr data-date='{$row['date']}'>";
                                        echo "<td>{$row['id']}</td>";
                                        echo "<td style='word-break: break-all;'>" . htmlspecialchars($row['name']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['reference']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['mobile_number']) . "</td>";
                                        echo "<td style='word-break: break-all;'>" . htmlspecialchars($row['address']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['time_of_classes']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['profession']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                                        echo "<td><a href='javascript:void(0);' onclick='confirmAdd(" . $row['id'] . ")' class='btn btn-info'>Add</a></td>";
                                        if ($isSuperAdmin) {
                                            echo "<td><a href='javascript:void(0);' onclick='confirmDelete(" . $row['id'] . ")' class='btn btn-danger'><i class='fas fa-trash'></i></a></td>";
                                        }
                                        echo "</tr>";
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

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script>
$(document).ready(function() {
    function filterRows() {
        var startDate = $('#start_date').val();
        var endDate = $('#end_date').val();
        $('#example1 tbody tr').filter(function() {
            var date = $(this).data('date');
            return date < startDate || date > endDate;
        }).hide();
        $('#example1 tbody tr').filter(function() {
            var date = $(this).data('date');
            return date >= startDate && date <= endDate;
        }).show();
    }

    // Set max attribute to current date to prevent future date selection
    var today = new Date().toISOString().split('T')[0];
    $('#start_date, #end_date').attr('max', today);

    $('#start_date, #end_date').change(filterRows);
    filterRows(); // Initial filter on page load

    $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            "dom": 'Bfrtip',
            "buttons": [
                {
                    extend: 'excelHtml5',
                    title: 'Inquiry Data',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Inquiry Data',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                }
            ],
            "columnDefs": [
        { "orderable": false, "targets": [8, 9] }
      ]
        });
});
</script>
<script>
    function confirmDelete(id) {
        var confirmAction = confirm("Are you sure you want to delete this Inquiry?");
        if (confirmAction) {
            window.location.href = 'inquiry_function.php?id=' + id;
        } else {
            // console.log('Deletion cancelled');
        }
    }
    function confirmAdd(id) {
        var confirmAction = confirm("Are you sure you want to add this Inquiry?");
        if (confirmAction) {
            window.location.href = 'studentform.php?id=' + id;
        } else {
            // console.log('Addition cancelled');
        }
    }
</script>
<?php include('./footer.php');?>

