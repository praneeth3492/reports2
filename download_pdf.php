<?php
session_start();

// Include necessary files and libraries
include 'config.php'; // Assuming this is your configuration and database connection file
require('fpdf.php');

// Check if the user is logged in
if (!isset($_SESSION['manager_id'])) {
    header("Location: index.php");
    exit;
}

// Fetch the user's details using manager_id stored in $_SESSION['manager_id']
$managerId = $_SESSION['manager_id'];
$userQuery = "SELECT * FROM users WHERE id = '$managerId'"; // Adjust this query based on your database structure
$userResult = mysqli_query($conn, $userQuery);
if (!$userResult) {
    die("Query Error: " . mysqli_error($conn));
}
$userDetails = mysqli_fetch_assoc($userResult);

// Fetch the performance details of the user from the database
$performanceQuery = "SELECT * FROM client_performance WHERE client_id = ?"; // Adjust this query based on your database structure
$performanceResult = mysqli_query($conn, $performanceQuery);
if (!$performanceResult) {
    die("Query Error: " . mysqli_error($conn));
}
$performanceData = mysqli_fetch_all($performanceResult, MYSQLI_ASSOC);

// Start the PDF generation
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Add user details to PDF (optional)
$pdf->Cell(0, 10, 'Performance Report for ' . $userDetails['name'], 0, 1, 'C'); // Centered title with user's name
$pdf->Ln(10); // Add some space

// Create table headers
$pdf->Cell(40, 10, 'Month', 1); // Table header with border
$pdf->Cell(40, 10, 'Performance', 1); // Table header with border
$pdf->Ln(); // Move to the next line

// Loop through the fetched performance data and add it to the PDF
foreach ($performanceData as $data) {
    $pdf->Cell(40, 10, $data['month'], 1); // Data with border
    $pdf->Cell(40, 10, $data['performance'], 1); // Data with border
    $pdf->Ln(); // Move to the next line after each row
}

// Output the PDF as a download
$pdf->Output('D', 'Performance_Report.pdf');
exit; // Stop further execution to ensure no other content is sent
?>
