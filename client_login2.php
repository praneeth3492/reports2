<!-- login.php -->
<?php
// Start a session to store the client_id
session_start();

 

// Replace 'your_db_host', 'your_db_user', 'your_db_password', and 'your_db_name' with your actual database credentials
$connection = mysqli_connect('localhost', 'root', '', 'client_performance');
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if the login form is submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Assuming your 'client' table has columns 'client_id', 'client_name', and 'password'
    $query = "SELECT client_id, client_name FROM clients WHERE client_name = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) === 1) {
        // If login is successful, store the client_id in a session variable
        $row = mysqli_fetch_assoc($result);
        $_SESSION['client_id'] = $row['client_id'];
        $_SESSION['client_name'] = $row['client_name'];
        
        // Redirect to the view_client_performance.php page after successful login
        header('Location: view_client_performance2.php');
        exit();
    } else {
        // Login failed, redirect back to the login_form.php with an error message
        header('Location: login_form.php?error=1');
        exit();
    }
}
?>
