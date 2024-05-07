<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User form</title>
</head>

<body>
    <?php include ('./header.php'); ?>
    <?php include ('./db.php'); ?>
    <?php

    require_once ('./function.php');

    $userData = null;
    $isUpdate = false;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $userData = selectFromTable('users', ['*'], ['id' => $id])[0] ?? null;
        $isUpdate = true;
    }

    if (!$userData) {
        echo "No user found with the specified ID.";
    }
    ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0"><?php echo $isUpdate ? 'Edit User Profile' : 'User Profile'; ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo $isUpdate ? 'Edit User' : 'User form'; ?></h3>
                            </div>
                            <form id="profileForm" method="post">
                                <input type="hidden" name="id" value="<?php echo $userData['id'] ?? ''; ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="text" class="form-control" name="username"
                                            value="<?php echo $userData['username'] ?? ''; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fullname">Full Name:</label>
                                        <input type="text" class="form-control" name="fullname"
                                            value="<?php echo $userData['fullname'] ?? ''; ?>" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="<?php echo $userData['email'] ?? ''; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mobile">Mobile:</label>
                                                <input type="text" class="form-control" name="mobile"
                                                    value="<?php echo $userData['mobile'] ?? ''; ?>" maxlength="10"
                                                    onkeypress="return onlyNumbers(event)" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password:</label>
                                                <input type="password" class="form-control" name="password" <?php echo $isUpdate ? '' : 'required'; ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="role">Role:</label>
                                                <select class="form-control" name="role" <?php echo $isUpdate ? '' : 'required'; ?>>
                                                    <option value="0" <?php echo ($userData && $userData['status'] == 0) ? 'selected' : ''; ?>>Superadmin</option>
                                                    <option value="1" <?php echo ($userData && $userData['status'] == 1) ? 'selected' : ''; ?>>Admin</option>
                                                    <option value="2" <?php echo ($userData && $userData['status'] == 2) ? 'selected' : ''; ?>>Faculty</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <button class="btn btn-primary"
                                id="submitInquiry"><?php echo $isUpdate ? 'Update' : 'Submit'; ?></button>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#submitInquiry').click(function (event) {
                event.preventDefault(); // Prevent the default form submission
                var formData = $('#profileForm').serialize();
                $.ajax({
                    type: 'POST',
                    url: 'profilerequest.php',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        alert(response.message); // Display the message from studentrequest.php
                        if (response.success) {
                            window.location.href = 'profile.php'; // Redirect to a generic page on success
                        } else {
                            alert("Error submitting details: " + response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        alert("Error: " + xhr.responseText);
                    }
                });
            });
        });
    </script>

    <script>
        function onlyNumbers(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                evt.preventDefault();
                return false;
            }
            return true;
        }
    </script>
    <?php include ('./footer.php'); ?>
