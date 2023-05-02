<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$database = "information_schema";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
try {
    $sql = file_get_contents('sql/bike_create_tables.sql');
    $data = $connection->exec($sql);
    $sql = file_get_contents('sql/bike_insert_data.sql');
    $data = $connection->exec($sql);
} catch (PDOException $e) {
    echo "huh: " . $e->getMessage();
}
