<?php
// add_client_action.php
require_once "config.php";

$clientName = $_POST['clientName'];
$monthId = $_POST['monthId'];

$sql = "INSERT INTO clients (client_name) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $clientName);

 

if ($stmt->execute()) {
    echo "Client added successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
