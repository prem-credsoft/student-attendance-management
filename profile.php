<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | User Profiles</title>
    <!-- Ensure to include CSS links for consistent styling -->
</head>

<body>

<?php include('./header.php'); ?>
<?php include('./db.php'); ?>
<?php
require_once('function.php');
$userData = selectFromTable('users', ['id', 'username', 'fullname', 'email', 'mobile', 'status', 'created_at'], []);
$admins = array_filter($userData, function($user) {
    return in_array($user['status'], [0, 1]); // 0 for Super Admin, 1 for Admin
});
$faculty = array_filter($userData, function($user) {
    return $user['status'] == 2; // 2 for Faculty
});
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Profiles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">User Profiles</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Admins and Super Admins Table -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Super Admins & Admins</h3>
                            <div class="card-tools">
                                <a href="./profileform.php" class="btn btn-primary">Add New Users</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="adminTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($admins as $row): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['id']) ?></td>
                                            <td><?= htmlspecialchars($row['username']) ?></td>
                                            <td><?= htmlspecialchars($row['fullname']) ?></td>
                                            <td><?= htmlspecialchars($row['email']) ?></td>
                                            <td><?= htmlspecialchars($row['mobile']) ?></td>
                                            <td><?= $row['status'] == 0 ? 'Super Admin' : 'Admin' ?></td>
                                            <td><?= htmlspecialchars($row['created_at']) ?></td>
                                            <td><a href='profileform.php?id=<?= htmlspecialchars($row['id']) ?>' class='btn btn-primary' onclick='return confirmEdit();'><i class='fas fa-edit'></i></a></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Faculty Table -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Faculty List</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="facultyTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($faculty as $row): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['id']) ?></td>
                                            <td><?= htmlspecialchars($row['username']) ?></td>
                                            <td><?= htmlspecialchars($row['fullname']) ?></td>
                                            <td><?= htmlspecialchars($row['email']) ?></td>
                                            <td><?= htmlspecialchars($row['mobile']) ?></td>
                                            <td>Faculty</td>
                                            <td><?= htmlspecialchars($row['created_at']) ?></td>
                                            <td><a href='profileform.php?id=<?= htmlspecialchars($row['id']) ?>' class='btn btn-primary' onclick='return confirmEdit();'><i class='fas fa-edit'></i></a></td>
                                        </tr>
                                        <?php endforeach; ?>
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#adminTable').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": true,
      "responsive": true
    });
    $('#facultyTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": true,
      "responsive": true
    });
  });

  function confirmEdit() {
    return confirm('Are you sure you want to edit this profile?');
  }
</script>
<?php include('./footer.php'); ?>
