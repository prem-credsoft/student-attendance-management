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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User List</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="userTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once('function.php');
                                        $userData = selectFromTable('users', ['id', 'username', 'fullname', 'email', 'mobile', 'created_at'], []);
                                        foreach ($userData as $row) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['fullname']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['mobile']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                                            echo "<td><a href='editProfile.php?username=" . htmlspecialchars($row['username']) . "' class='btn btn-primary' onclick='return confirmEdit();'>Edit</a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
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
    $('#userTable').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
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
