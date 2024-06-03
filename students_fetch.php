<?php
require_once 'db.php';

$batchId = $_GET['batchId'] ?? '';

$sql = "SELECT id, name, mobile_number FROM studentinfo";
$params = [];

if ($batchId !== '') {
    $sql .= " WHERE batch = ?";
    $params[] = $batchId;
}

try {
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$rows) {
        echo "<tr><td colspan='3'>No students found for the selected batch.</td></tr>";
        exit;
    }

    foreach ($rows as $row) {
        echo "<tr>";
        echo "<td><input type='checkbox' name='selectedInquiries[]' value='" . $row['id'] . "'></td>";
        // echo "<td>RIE - " . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mobile_number']) . "</td>";
        echo "</tr>";
    }
} catch (PDOException $e) {
    echo "<tr><td colspan='3'>Error fetching data.</td></tr>";
    exit;
}
?>