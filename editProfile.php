<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Profile</title>
    <link rel="stylesheet" href="path/to/your/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/your/css/custom.css">
</head>

<body>
    <?php
    include ('./header.php');
    include ('./db.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
    
        $query = $db->prepare("UPDATE users SET fullname = ?, email = ?, mobile = ?, password = ? WHERE username = ?");
        $result = $query->execute([$fullname, $email, $mobile, $password, $username]);
    }

    if (isset($_GET['username'])) {
        $username = $_GET['username'];
        $query = $db->prepare("SELECT * FROM users WHERE username = ?");
        $query->execute([$username]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
    }

    if (!empty($user)) {
        ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0">Edit User Profile</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Profile</h3>
                        </div>
                        <form id="updateProfileForm" method="post">
                            <div class="card-body">
                                <input type="hidden" name="username"
                                    value="<?php echo htmlspecialchars($user['username']); ?>">
                                <div class="form-group">
                                    <label for="fullname">Full Name:</label>
                                    <input type="text" class="form-control" name="fullname"
                                        value="<?php echo htmlspecialchars($user['fullname']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" name="email"
                                        value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile:</label>
                                    <input type="text" class="form-control" name="mobile" maxlength="10" required
                                        onkeypress="return onlyNumbers(event)"
                                    value="<?php echo htmlspecialchars($user['mobile']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" name="password"
                                        value="<?php echo htmlspecialchars($user['password']); ?>" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="submitProfileUpdate">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    <?php } else { ?>
        <p>User not found.</p>
    <?php } ?>
    <?php include ('./footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#updateProfileForm').on('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission
            var confirmUpdate = confirm("Are you sure you want to update this profile?");
            if (confirmUpdate) {
                $.ajax({
                    type: 'POST',
                    url: 'editProfile.php',
                    data: $(this).serialize(),
                    success: function (response) {
                        alert('Profile updated successfully!');
                        window.location.href = 'profile.php';
                    },
                    error: function () {
                        alert('Error updating profile. Please try again.');
                    }
                });
            }
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
</body>

</html>