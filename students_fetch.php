<?php
require_once 'db.php'; // Include database connection setup

$dateFilter = $_GET['dateFilter'] ?? 'today'; // Default to today if nothing is passed
$today = date('Y-m-d');
$sql = "";
$params = [];

switch ($dateFilter) {
    case 'today':
        $sql = "SELECT id, name, mobile_number, date FROM studentinfo WHERE date = ?";
        $params = [$today];
        break;
    case 'yesterday':
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $sql = "SELECT id, name, mobile_number, date FROM studentinfo WHERE date = ?";
        $params = [$yesterday];
        break;
    case '3days':
        $datePast = date('Y-m-d', strtotime('-2 days'));
        $sql = "SELECT id, name, mobile_number, date FROM studentinfo WHERE date BETWEEN ? AND ?";
        $params = [$datePast, $today];
        break;
    case 'week':
        $dateWeek = date('Y-m-d', strtotime('-1 week'));
        $sql = "SELECT id, name, mobile_number, date FROM studentinfo WHERE date BETWEEN ? AND ?";
        $params = [$dateWeek, $today];
        break;
}

try {
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$rows) {
        echo "No inquiries found for the selected date range.";
        exit;
    }

    foreach ($rows as $row) {
        echo "<tr>";
        echo "<td><input type='checkbox' name='selectedInquiries[]' value='" . $row['id'] . "'></td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mobile_number']) . "</td>";
        echo "<td>" . $row['admission_time'] . "</td>";
        echo "</tr>";
    }
} catch (PDOException $e) {
    echo "No Records";
    exit;
}
?>