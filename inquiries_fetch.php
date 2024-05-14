<?php
require_once 'db.php'; // Include database connection setup

// Fetch start_date and end_date from GET parameters
$startDate = $_GET['start_date'] ?? date('Y-m-d'); // Default to today if not provided
$endDate = $_GET['end_date'] ?? date('Y-m-d'); // Default to today if not provided

// Prepare SQL query to fetch inquiries within the date range
$sql = "SELECT id, name, mobile_number, date FROM inquiryinfo WHERE date BETWEEN ? AND ?";
$params = [$startDate, $endDate];

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
        echo "<td>" . $row['date'] . "</td>";
        echo "</tr>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>
?>