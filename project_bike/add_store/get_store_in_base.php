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


// var_dump($_GET); // ключ stors

$new_store = [$_POST['store_name'], $_POST['phone']];
var_dump($new_store);
// var_dump($_POST);

$data = $connection->query("INSERT INTO stores(store_name, phone)
                    VALUES('$new_store[0]','$new_store[1]');"
                    )->fetchAll(PDO::FETCH_ASSOC);
//and somewhere later:
// foreach ($data as $row) {
//     var_dump($row);
// }
