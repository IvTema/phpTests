<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$database = "production";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


var_dump($_POST); // ключ stors

$del_stors = $_POST;
var_dump($del_stors);
// var_dump($_POST);
foreach ($del_stors as $store){
    $data = $connection->query("DELETE FROM stores
                    WHERE `store_id` = $store;"
                    )->fetchAll(PDO::FETCH_ASSOC);
}

