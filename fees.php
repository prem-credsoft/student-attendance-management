<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Fees Receipt</title>
</head>

<?php include ('./header.php');
require_once 'function.php';

// Check user status from session
$isSuperAdmin = isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'super_admin';

// Fetch student details and total paid amounts
$query = "
    SELECT si.id, si.name, si.mobile_number, si.due_date, si.total_fees, si.pending_fees, COALESCE(SUM(r.amount), 0) AS total_paid
    FROM studentinfo si
    LEFT JOIN receipt r ON si.id = r.student_id
    WHERE si.alumnistudent <> 1
    GROUP BY si.id
";
$students = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Fees Receipt</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Fees Receipt</li>
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
              <h3 class="card-title">Fees Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>GR No.</th>
                      <th>Student Name</th>
                      <th>Mobile Number</th>
                      <th>Next Due Date</th>
                      <th>Total Fees</th>
                      <th>Pending Fees</th>
                      <th>Total Paid</th>
                      <th>All Receipt</th>
                      <!-- <th>Edit</th> -->
                      <?php if ($isSuperAdmin): ?>
                        <!-- <th>Delete</th> -->
                      <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($students as $student): ?>
                    <tr>
                      <td><?php echo $student['id']; ?></td>
                      <td style='word-break: break-all;'><?php echo $student['name']; ?></td>
                      <td><?php echo $student['mobile_number']; ?></td>
                      <td><?php echo $student['due_date']; ?></td>
                      <td><?php echo $student['total_fees']; ?>.00</td>
                      <td><?php echo $student['pending_fees']; ?>.00</td>
                      <td><?php echo $student['total_paid']; ?></td>
                      <td><a href='javascript:void(0);' onclick='confirmAllReceipts("<?php echo $student['id']; ?>")' class='btn btn-info'>All Receipts</a></td>
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
        title: 'Inquiry Data',
      },
      {
        extend: 'pdfHtml5',
        title: 'Inquiry Data',
      }
    ],
    "columnDefs": [
        { "orderable": false, "targets": [7] }
      ]
  });
  });


  function confirmAllReceipts(studentId) {
    var confirmAction = confirm("Are you sure you want to see all fees receipts for this student?");
    if (confirmAction) {
      window.location.href = 'fees_receipt.php?student_id=' + studentId;
    } else {
      console.log('Action cancelled');
    }
  }
</script>
<?php include ('./footer.php'); ?>