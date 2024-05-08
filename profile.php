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
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('function.php');
$userData = selectFromTable('users', ['id', 'username', 'fullname', 'email', 'mobile', 'status', 'created_at'], []);

$superAdmins = array_filter($userData, function($user) {
    return $user['status'] == 0;
});
$admins = array_filter($userData, function($user) {
    return $user['status'] == 1;
});
$faculty = array_filter($userData, function($user) {
    return $user['status'] == 2;
});

$userStatus = $_SESSION['user_status'] ?? null;
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
                    <!-- Super Admins Table -->
                    <?php if ($userStatus == 'super_admin'): ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Super Admins</h3>
                                <div class="card-tools">
                                    <a href="./profileform.php" class="btn btn-primary">Add New Users</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="superAdminTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Username</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($superAdmins as $row): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row['id']) ?></td>
                                                <td><?= htmlspecialchars($row['username']) ?></td>
                                                <td><?= htmlspecialchars($row['fullname']) ?></td>
                                                <td><?= htmlspecialchars($row['email']) ?></td>
                                                <td><?= htmlspecialchars($row['mobile']) ?></td>
                                                <td>Super Admin</td>
                                                <td><a href='profileform.php?id=<?= htmlspecialchars($row['id']) ?>' class='btn btn-primary'><i class='fas fa-edit'></i></a></td>
                                                <td><a href='javascript:void(0);' onclick='confirmDelete(<?= $row['id'] ?>)' class='btn btn-danger'><i class='fas fa-trash'></i></a></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Admins Table -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Admins</h3>
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
                                                <th>Edit</th>
                                                <th>Delete</th>
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
                                                <td>Admin</td>
                                                <td><a href='profileform.php?id=<?= htmlspecialchars($row['id']) ?>' class='btn btn-primary'><i class='fas fa-edit'></i></a></td>
                                                <td><a href='javascript:void(0);' onclick='confirmDelete(<?= $row['id'] ?>)' class='btn btn-danger'><i class='fas fa-trash'></i></a></td>
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
                                                <th>Edit</th>
                                                <th>Delete</th>
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
                                                <td><a href='profileform.php?id=<?= htmlspecialchars($row['id']) ?>' class='btn btn-primary'><i class='fas fa-edit'></i></a></td>
                                                <td><a href='javascript:void(0);' onclick='confirmDelete(<?= $row['id'] ?>)' class='btn btn-danger'><i class='fas fa-trash'></i></a></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($userStatus == 'admin'): ?>
                        <!-- Admins Table -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Admins</h3>
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
                                                <th>Edit</th>
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
                                                <td>Admin</td>
                                                <td><a href='profileform.php?id=<?= htmlspecialchars($row['id']) ?>' class='btn btn-primary'><i class='fas fa-edit'></i></a></td>
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
                                                <th>Edit</th>
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
                                                <td><a href='profileform.php?id=<?= htmlspecialchars($row['id']) ?>' class='btn btn-primary'><i class='fas fa-edit'></i></a></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($userStatus == 'faculty'): ?>
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
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#superAdminTable').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true
    });

    $('#adminTable').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true
    });

    $('#facultyTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true
    });
  });

  function confirmEdit() {
    return confirm('Are you sure you want to edit this profile?');
  }

  function confirmDelete(id) {
    var confirmAction = confirm("Are you sure you want to delete this profile?");
    if (confirmAction) {
        window.location.href = 'profile_function.php?id=' + id;
    }
  }
</script>
<?php include('./footer.php'); ?>



