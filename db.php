<?php

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    $host = "localhost";
    $dbname = "student-attendance-management";
    $user = "root";
    $password = "";
} else {
    $host = "localhost";
    $dbname = "credsoft_rieportal";
    $user = "credsoft_rieportal";
    $password = "Balaji@1435";
}

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>