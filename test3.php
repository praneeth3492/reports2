<?php
require 'config.php'; // Make sure you have your database configuration here

try {
    $db = new PDO("mysql:host=localhost;dbname=pms", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // List all tables
    $stmt = $db->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_NUM);
    foreach ($tables as $table) {
        echo "Table: " . $table[0] . "<br>";
        
        // Get structure of each table
        $describeStmt = $db->query("DESCRIBE " . $table[0]);
        $columns = $describeStmt->fetchAll(PDO::FETCH_ASSOC);
        echo "Columns: <br>";
        foreach ($columns as $column) {
            echo $column['Field'] . " - " . $column['Type'] . "<br>";
        }
        echo "<br>";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
