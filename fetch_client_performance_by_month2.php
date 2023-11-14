<?php
// Start a session to access the client_id
session_start();

// Replace 'your_db_host', 'your_db_user', 'your_db_password', and 'your_db_name' with your actual database credentials
$connection = mysqli_connect('localhost', 'root', '', 'pms');
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
// Check if the client is logged in

    $clientId = $_POST['client_id'];

    if($clientId == null){
        $clientId = $_SESSION['client_id'];
    }
    $month    = $_POST['month'];
 

 
        $query = "SELECT * FROM client_performance WHERE client_id = '$clientId' and
        month_id = '$month'";
   
    
    // Assuming your 'performance' table has a column 'client_id' to associate with the 'client' table
   
    $result = mysqli_query($connection, $query);
    $techarray = array();
   
    if (mysqli_num_rows($result) > 0) {
          $data = mysqli_fetch_assoc($result);
        
        
        echo json_encode($data);
    } else {
        // If no data is found for the logged-in client
        echo json_encode(array('error' => 'No data available for the logged-in client.'));
    }


   
    // Return the JSON data
   


    // Close the database connection
    mysqli_close($connection);
?>
