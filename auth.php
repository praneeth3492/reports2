<?php
// Add these lines at the beginning of auth.php
define('ADMIN_USERNAME', 'your_admin_username');
define('ADMIN_PASSWORD', 'your_admin_password');

// Modify the if block after checking the login credentials
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['manager_id'] = $row['id'];
    $_SESSION['manager_name'] = $row['name'];
    $_SESSION['manager_role'] = $row['role'];
    header('Location: manager_dashboard.php');
} else {
    // Check if the entered credentials match the admin username and password
    if ($username == ADMIN_USERNAME && $password == ADMIN_PASSWORD) {
        $_SESSION['manager_id'] = -1; // Assign a special ID for the admin user
        $_SESSION['manager_name'] = 'Admin';
        $_SESSION['manager_role'] = 'admin';
        header('Location: dashboard.php');
    } else {
        $error = "Invalid login credentials";
    }
}

session_start();
require_once 'functions.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = checkLogin($username, $password);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['manager_id'] = $row['id'];
    $_SESSION['manager_name'] = $row['name'];
    header('Location: manager_dashboard.php');
  } else {
    $error = "Invalid login credentials";
  }
}

if (isset($_GET['logout'])) {
  session_destroy();
  header('Location: login.php');
}

function isLoggedIn() {
  return isset($_SESSION['manager_id']);
}

function requireLogin() {
  if (!isLoggedIn()) {
    header('Location: login.php');
  }
}
?>
