<?php
include('./db.php');
include('./function.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Use the updateTable function from function.php
    $updateSuccess = updateTable("users", [
        "fullname" => $fullname,
        "email" => $email,
        "mobile" => $mobile,
        "password" => $password
    ], ["username" => $username]);

    if ($updateSuccess) {
        ajaxResponse(true, [], "Profile updated successfully!");
    } else {
        ajaxResponse(false, [], "Error updating profile.");
    }
}
