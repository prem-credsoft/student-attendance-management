<?php
    ob_start();
    session_start();

    unset($_SESSION['user_id']);
    unset($_SESSION['user_status']);

    // Destroy the entire session
    session_destroy();

    // Redirect to the login page
    header("Location: index.php");
?>
?>