<?php
session_start();

require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit();
}

// Fetch user details
require_once ('function.php');
$user = selectFromTable('users', ['*'], ['id' => $_SESSION['user_id']]);
$user = $user[0];

// Check user status
$isFaculty = isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'faculty';
$isAdmin = isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'admin';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RIE Portal | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <!-- Data table  -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"> -->
  <link rel="stylesheet" href="./asset/css/adminlte.min.css">
  <link rel="stylesheet" href="./asset/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <style>
    .card-list-custom {
      height: 50vh;
      overflow-y: scroll;
      padding: 0;
      margin: 1.25rem;
    }

    table thead tr {
      border: 2px solid #dee2e6
    }

    table thead {
      position: sticky;
      top: 0;
      background-color: white;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="./asset/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light sticky-top">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item d-flex align-items-center">
          <span class="mr-3" style="font-size:20px;">Hi, <?php echo $user['fullname']; ?></span>
          <a href="./profile.php" style="font-size:20px;" class="d-block mr-2"><i class="fas fa-cog"></i></a>
          <a href="./logout.php" style="font-size:20px;"><i class="fas fa-sign-out-alt" style="color:red"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <?php if ($_SESSION['user_status'] === 'faculty'): ?>
        <a href="./batch.php" class="brand-link" style="text-align:center;background:#efefef;">
        <?php else: ?>
          <a href="./dashboard.php" class="brand-link" style="text-align:center;background:#efefef;">
          <?php endif; ?>
          <img src="./asset/img/logo.svg" alt="RIE logo Logo" style="height:50px;">
          <!-- <span class="brand-text font-weight-light">Admin</span> -->
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <?php if (!$isFaculty): ?>
                <li class="nav-item">
                  <a href="./dashboard.php" class="nav-link 
            <?php if (strpos($_SERVER['REQUEST_URI'], 'dashboard.php') !== false) {
              echo "active";
            } ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./inquiry.php" class="nav-link
            <?php if (strpos($_SERVER['REQUEST_URI'], 'inquiry.php') !== false) {
              echo "active";
            } ?>">
                    <i class="nav-icon far fa-envelope"></i>
                    <p>
                      Inquiry
                    </p>
                  </a>
                <li class="nav-item">
                  <a href="./studentsdetails.php" class="nav-link
            <?php if (strpos($_SERVER['REQUEST_URI'], 'studentsdetails.php') !== false) {
              echo "active";
            } ?>">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                      Students Details
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./fees.php" class="nav-link
            <?php if (strpos($_SERVER['REQUEST_URI'], 'fees.php') !== false) {
              echo "active";
            } ?>">
                    <i class="nav-icon fas fa-rupee-sign"></i>
                    <p>
                      Fees Receipt
                    </p>
                  </a>
                </li>
              <?php endif; ?>
              <li class="nav-item">
                <a href="./batch.php" class="nav-link
            <?php if (strpos($_SERVER['REQUEST_URI'], 'batch.php') !== false) {
              echo "active";
            } ?>">
                  <i class="nav-icon fas fa-th-large"></i>
                  <p>
                    Batch Attendance
                    <!-- <span class="badge badge-danger right">New</span> -->
                  </p>
                </a>
              </li>
              <?php if (!$isFaculty && !$isAdmin): ?>
                <li class="nav-item">
                  <a href="./user_management.php" class="nav-link
            <?php if (strpos($_SERVER['REQUEST_URI'], 'user_management.php') !== false) {
              echo "active";
            } ?>">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                      User Management
                    </p>
                  </a>
                </li>
              </li>
              <?php endif; ?>
              <?php if (!$isFaculty): ?>
                <li class="nav-item">
                  <a href="./alumni_students_details.php" class="nav-link
            <?php if (strpos($_SERVER['REQUEST_URI'], 'alumni_students_details.php') !== false) {
              echo "active";
            } ?>">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                      Alumni Students
                    </p>
                  </a>
                <li class="nav-item">
                  <a href="./inquirysms.php" class="nav-link
            <?php if (strpos($_SERVER['REQUEST_URI'], 'inquirysms.php') !== false) {
              echo "active";
            } ?>">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Inquiry SMS
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./studentsms.php" class="nav-link
            <?php if (strpos($_SERVER['REQUEST_URI'], 'studentsms.php') !== false) {
              echo "active";
            } ?>">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Student SMS
                    </p>
                  </a>
                </li>
              <?php endif; ?>

            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>