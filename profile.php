<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | User Profiles</title>
    <!-- Ensure to include CSS links for consistent styling -->
</head>

<body>

    <?php include ('./header.php'); ?>
    <?php include ('./db.php'); ?>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once ('function.php');

    // Fetch only the logged-in user's data
    $userId = $_SESSION['user_id'] ?? null;
    $userData = selectFromTable('users', ['id', 'username', 'fullname', 'email', 'mobile', 'status', 'created_at'], ['id' => $userId]);

    if (!$userData) {
        echo "<p>User data not found.</p>";
    } else {
        $user = $userData[0]; // Assuming the user exists and is unique
        ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">User Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active">User Profile</li>
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
                                    <h3 class="card-title">User Profile</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
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
                                            <tr>
                                                <td><?= htmlspecialchars($user['id']) ?></td>
                                                <td><?= htmlspecialchars($user['username']) ?></td>
                                                <td><?= htmlspecialchars($user['fullname']) ?></td>
                                                <td><?= htmlspecialchars($user['email']) ?></td>
                                                <td><?= htmlspecialchars($user['mobile']) ?></td>
                                                <td><?= $user['status'] == 0 ? 'Super Admin' : ($user['status'] == 1 ? 'Admin' : 'Faculty') ?>
                                                </td>
                                                <td><a href='profileform.php?id=<?= htmlspecialchars($user['id']) ?>'
                                                        class='btn btn-primary'><i class='fas fa-edit'></i> Edit</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php
    } // End of user data check
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.table').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": true
            });
        });
    </script>

    <?php include ('./footer.php'); ?>