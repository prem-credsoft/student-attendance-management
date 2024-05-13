<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Fees Receipt</title>
</head>

<?php
include ('./header.php');
require_once 'function.php';

$studentId = $_GET['student_id'] ?? null;
$studentName = "";
$receipts = [];

if ($studentId) {
  $studentInfo = selectFromTable('studentinfo', ['name'], ['id' => $studentId]);
  $studentName = $studentInfo[0]['name'] ?? "Unknown Student";
  $receipts = selectFromTable('receipt', ['id', 'student_id', 'amount', 'payment_date', 'message'], ['student_id' => $studentId]);
}

// Check user status from session
$isSuperAdmin = isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'super_admin';
$isAdmin = isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'admin';
$isFaculty = isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'faculty';
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
              <h3 class="card-title">All Fees Receipt of <?php echo htmlspecialchars($studentName); ?></h3>
              <div class="card-tools">
                <a href="./feesform.php?student_id=<?php echo htmlspecialchars($studentId); ?>"
                  class="btn btn-primary">Add New Fees Receipt</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>GR No.</th>
                      <th>Student Name</th>
                      <th>Amount</th>
                      <th>Payment Date</th>
                      <th>Message</th>
                      <th>Print Receipt</th>
                      <?php if ($isSuperAdmin || $isAdmin): ?>
                        <th>Edit</th>
                      <?php endif; ?>
                      <?php if ($isSuperAdmin): ?>
                        <th>Delete</th>
                      <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($receipts as $receipt): ?>
                      <tr>
                        <td>RIE - <?php echo htmlspecialchars($receipt['student_id']); ?></td>
                        <td><?php echo htmlspecialchars($studentName); ?></td>
                        <td><?php echo htmlspecialchars($receipt['amount']); ?></td>
                        <td><?php echo htmlspecialchars($receipt['payment_date']); ?></td>
                        <td><?php echo htmlspecialchars($receipt['message']); ?></td>
                        <?php if ($isSuperAdmin || $isAdmin): ?>
                          <td><button class="btn btn-primary" onclick="printPDF('<?php echo $receipt['id']; ?>')">Print
                              PDF</button></td>
                          <td><a href='javascript:void(0);' onclick="confirmEdit('<?php echo $receipt['id']; ?>')"
                              class='btn btn-primary'><i class='fas fa-edit'></i></a></td>
                        <?php endif; ?>
                        <?php if ($isSuperAdmin): ?>
                          <td><a href='javascript:void(0);' onclick="confirmDelete('<?php echo $receipt['id']; ?>')"
                              class='btn btn-danger'><i class='fas fa-trash'></i></a></td>
                        <?php endif; ?>
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
<!-- /.content-wrapper -->

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
      "info": false,
      "autoWidth": false,
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
      ]
    });
  });

  function printPDF(receiptId) {
    $.ajax({
      url: './pdf_design.php',
      type: 'GET',
      data: { id: receiptId },
      dataType: 'json', // Ensure jQuery treats the response as JSON
      success: function (docDefinition) {
        // Directly use the response object
        pdfMake.createPdf(docDefinition).download('receipt-' + receiptId + '.pdf');
      },
      error: function () {
        alert('Failed to generate PDF');
      }
    });
  }

  function confirmDelete(id) {
    var confirmAction = confirm("Are you sure you want to delete this Fees Details?");
    if (confirmAction) {
      window.location.href = 'fees_function.php?id=' + id;
    } else {
      // Deletion cancelled
    }
  }

  function confirmEdit(id) {
    var confirmAction = confirm("Are you sure you want to edit this Fee Receipt details?");
    if (confirmAction) {
      window.location.href = 'feesform.php?id=' + id;
    } else {
      // Edit cancelled
    }
  }
</script>

<?php include ('./footer.php'); ?>