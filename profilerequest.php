<?php
require_once 'function.php';
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'username' => $_POST['username'] ?? '',
        'fullname' => $_POST['fullname'] ?? '',
        'email' => $_POST['email'] ?? '',
        'mobile' => $_POST['mobile'] ?? '',
        'password' => $_POST['password'] ?? '',
        'status' => $_POST['role'] ?? '',
    ];
    if (!empty($_POST['id'])) {
        // Update existing student
        $id = $_POST['id'];
        $result = updateTable('users', $data, ['id' => $id]);
        $actionResult = $result ? "User Details updated successfully." : "Failed to update Details.";
    } else {
        // Insert new student
        $result = insertIntoTable('users', $data);
        $actionResult = $result ? "User Details submitted successfully." : "Failed to submit Details.";
        
    }

    header('Content-Type: application/json');
    echo json_encode([
        'success' => $result,
        'message' => $actionResult
    ]);
    exit;
} else {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method.'
    ]);
    exit;
}
?>
