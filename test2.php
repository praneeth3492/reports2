<?php
require_once "config.php"; // Make sure this file contains the correct database connection information

// Function to get table structure
function getTableStructure($conn, $tableName) {
    $sql = "DESCRIBE " . $tableName;
    $result = $conn->query($sql);

    if ($result) {
        $structure = [];
        while ($row = $result->fetch_assoc()) {
            $structure[] = $row;
        }
        return $structure;
    } else {
        die("Error describing table: " . $conn->error);
    }
}

// Use the function for each table you want to check
echo "<pre>";
echo "Structure of 'clients' table:\n";
print_r(getTableStructure($conn, 'clients'));
echo "\nStructure of 'months' table:\n";
print_r(getTableStructure($conn, 'months'));
echo "</pre>";

$conn->close();
?>
