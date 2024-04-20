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
              // Fetch the total number of students
              $stmt = $db->query("SELECT COUNT(*) AS total_enquiries FROM enquirieinfo");
              $result = $stmt->fetch(PDO::FETCH_ASSOC);
              $total_enquiries = $result['total_enquiries'];
              ?>
              <h3><?php echo $total_enquiries; ?></h3>

              <p>Enquiries</p>
            </div>
            <div class="icon">
              <i class="ion ion-help"></i>
            </div>
            <a href="./enquiries.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              // Fetch the total number of students
              $stmt = $db->query("SELECT COUNT(*) AS total_students FROM studentinfo");
              $result = $stmt->fetch(PDO::FETCH_ASSOC);
              $total_students = $result['total_students'];
              ?>
              <h3><?php echo $total_students; ?></h3>
              <p>Students</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-contact"></i>
            </div>
            <a href="./studentsdetails.php" class="small-box-footer">More info <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53</h3>

              <p>Leaves</p>
            </div>
            <div class="icon">
              <i class="ion ion-calendar"></i>
            </div>
            <a href="./leaves.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>Pending Fees</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="./fees.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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