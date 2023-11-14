<?php
// fetch_latest.php
require_once "config.php";

$sql = "SELECT * FROM client_performance ORDER BY last_updated DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['client_id']) . "</td>"; // replace 'client_column_name' with your actual column name for client
    echo "<td>" . htmlspecialchars($row['manager_id']) . "</td>"; // replace 'manager_column_name' with your actual column name for manager
    echo "</tr>";
} else {
    echo '<tr><td colspan="2">No records found.</td></tr>';
}

$stmt->close();
?>
