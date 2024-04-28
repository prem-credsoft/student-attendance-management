<?php
include('db.php'); // Ensure this path is correct

session_start(); // Start the session to use session variables

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $db->prepare("DELETE FROM batch_table WHERE id = ?");
    $result = $stmt->execute([$id]);

    if ($result) {
        $_SESSION['message'] = "Batch deleted successfully.";
    } else {
        $_SESSION['message'] = "Failed to delete batch.";
    }
} else {
    $_SESSION['message'] = "No batch ID provided.";
}

header('Location: batch.php'); // Redirect to batch.php
exit();
?>