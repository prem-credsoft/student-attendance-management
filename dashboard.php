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
            <a href="./profile.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- right col -->
</div>
<!-- /.row (main row) -->

<?php include ('./footer.php'); ?>

</body>

</html>