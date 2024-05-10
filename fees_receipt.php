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
                  <a href="./feesform.php" class="btn btn-primary">Add New Fees Receipt</a>
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
  </script>

  <?php include ('./footer.php'); ?>