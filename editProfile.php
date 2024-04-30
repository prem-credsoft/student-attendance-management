<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Profile</title>
    <!-- Ensure to include CSS links for consistent styling -->
    <link rel="stylesheet" href="path/to/your/css/bootstrap.min.css"> <!-- Example path -->
    <link rel="stylesheet" href="path/to/your/css/custom.css"> <!-- Your custom styles if any -->
</head>
<body>
<?php
include('./header.php');
include('./db.php');
include('function.php');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Username is unique and used to identify the user
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password']; // Consider hashing the password before storing

    // Prepare the data for updating
    $data = array('fullname' => $fullname, 'email' => $email, 'mobile' => $mobile, 'password' => $password);
    $conditions = array('username' => $username);

    // Call the updateTable function to update the user profile
    $result = updateTable('users', $data, $conditions);

    if ($result) {
        // Handle success, if needed
    } else {
        // Handle failure, if needed
    }
}

// Retrieve user details if the username is set in the URL
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Profile</h3>
                            </div>
                            <form id="updateProfileForm" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" disabled>
                                        <input type="hidden" name="username" value="<?php echo htmlspecialchars($user['username']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="fullname">Full Name:</label>
                                        <input type="text" class="form-control" name="fullname" value="<?php echo htmlspecialchars($user['fullname']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Mobile:</label>
                                        <input type="text" class="form-control" name="mobile" value="<?php echo htmlspecialchars($user['mobile']); ?>" maxlength="10" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                                <div class="card-footer">   
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to update this profile?')">Update Profile</button>
                                    <div id="updateSuccessMessage" style="display:none; color: green;"></div> <!-- Success message placeholder -->
                                    <div id="updateErrorMessage" style="display:none; color: red;"></div> <!-- Error message placeholder -->
                                </div>
                            </form>
                        </div>
                    <?php } else { ?>
                        <p>User not found.</p>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>

<?php include('./footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#updateProfileForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission
        var confirmUpdate = confirm("Are you sure you want to update this profile?"); // Confirmation dialog
        if (confirmUpdate) { // Check if the user confirmed the update
            $.ajax({
                type: 'POST',
                url: 'editProfile.php',
                data: $(this).serialize(),
                success: function(response) {
                    // alert('Profile updated successfully!'); // Display success alert
                    window.location.href = 'profile.php'; // Redirect to profile page or any other page
                },
                error: function() {
                    alert('Error updating profile. Please try again.'); // Display error alert
                }
            });
        }
    });
});
</script>
</body>     
</html>