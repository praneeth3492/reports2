<?php
session_start();
require_once "config.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);


if (!isset($_SESSION["manager_id"])) {
    header("Location: login.php");
    exit;
}

$manager_id = $_SESSION["manager_id"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle the form submission
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    $image = $_FILES['image'];

    $target_file = null; // Define $target_file here

    // Update the password in the database
    $sql = "UPDATE managers SET password = ? WHERE manager_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_password, $manager_id);
    $stmt->execute();
    $stmt->close();

    // Handle the image upload
    // Handle the image upload
if ($image['error'] == 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image["name"]);
    
    // Move the uploaded file to the target directory
    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        // Update the image_path in the database
        $sql = "UPDATE managers SET image_path = ? WHERE manager_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $target_file, $manager_id);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Failed to move the uploaded file.";
    }
} else {
    echo "File upload error: " . $image['error'];
}}

// Fetch the manager's data
$sql = "SELECT * FROM managers WHERE manager_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $manager_id);
$stmt->execute();
$result = $stmt->get_result();
$manager_data = $result->fetch_assoc();
$stmt->close();

echo "New password: $new_password";
echo "Target file: $target_file";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Settings</title>
</head>
<body>

<form action="" method="POST" enctype="multipart/form-data">
    <div>
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>
    </div>
    <div>
        <label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
    </div>
    <button type="submit">Save Changes</button>
</form>

</body>
</html>
