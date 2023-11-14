<?php
session_start();
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clientId = $_POST['client_id'] ?? $_SESSION['client_id'];
    $selectedMonth = $_POST['month'];
    $providedMonth = $_POST['provided_month'];

    $query = "SELECT * FROM client_performance WHERE client_id = ? AND month_id IN (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iii", $clientId, $selectedMonth, $providedMonth);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    $stmt->close();
}

$sql = "SELECT * FROM months";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$months = [];
while ($row = $result->fetch_assoc()) {
    $months[] = $row;
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Performance</title>
</head>
<body>

<form method="POST" action="view_performance.php">
    <label for="month">Select Month:</label>
    <select name="month" id="month">
        <?php foreach ($months as $month): ?>
            <option value="<?= $month['id'] ?>"><?= $month['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="provided_month">Provided Month ID:</label>
    <input type="text" name="provided_month" id="provided_month">

    <input type="submit" value="View Performance">
</form>

<?php if (isset($data) && count($data) > 0): ?>
    <table border="1">
        <tr>
            <!-- Add column headers based on your database structure -->
            <th>Month ID</th>
            <th>Performance Data</th>
        </tr>
        <?php foreach ($data as $row): ?>
            <tr>
                <!-- Add data cells based on your database structure -->
                <td><?= $row['month_id'] ?></td>
                <td><?= $row['performance_data'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php elseif (isset($data)): ?>
    <p>No data available for the selected months.</p>
<?php endif; ?>

</body>
</html>
