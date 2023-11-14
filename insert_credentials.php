<?php
// insert_credentials.php
require_once "config.php";

// Insert admin credential
$admin_name = "admin";
$admin_password = password_hash("admin123", PASSWORD_DEFAULT);
$is_admin = 1; // Set is_admin to true (1) for admin

$sql = "INSERT INTO managers (manager_name, password, is_admin) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $admin_name, $admin_password, $is_admin);

if ($stmt->execute()) {
    echo "Admin credential added successfully!<br>";
} else {
    echo "Error: " . $stmt->error . "<br>";
}

$stmt->close();

// Insert manager credential
$manager_name = "manager";
$manager_password = password_hash("manager123", PASSWORD_DEFAULT);
$is_admin = 0; // Set is_admin to false (0) for manager

$sql = "INSERT INTO managers (manager_name, password, is_admin) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $manager_name, $manager_password, $is_admin);

if ($stmt->execute()) {
    echo "Manager credential added successfully!<br>";
} else {
    echo "Error: " . $stmt->error . "<br>";
}

$stmt->close();
$conn->close();
?>
