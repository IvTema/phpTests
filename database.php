<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$database = "messenger";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    //echo "Connection failed: " . $e->getMessage();
}


$users = $connection->query("SELECT * FROM users")->fetchAll();
$messages = $connection->query("SELECT * FROM messages")->fetchAll();
// and somewhere later:
foreach ($messages as $message) {
    $senderid = $message["sender_id"];
    $receiverid = $message["receiver_id"];
    $text = $message["message"];
    $output = ['','->','',''];
    $output[3] = '"'.$text.'"';
    foreach ($users as $user) {
    if ($user["user_id"]==$senderid){
        $output[0] =  $user["name"];
    } elseif ($user["user_id"] == $receiverid){
        $output[2] =  $user["name"];
    }
    }
    $out = [];
    echo implode('&nbsp', $output) . "<br>";
}

// masha -> petya "hello, petya"
// select * from users where user_id=1

// $users = $connection->query("SELECT * FROM users")->fetchAll();
// foreach ($users as $user) {
//     $senderid = $message["sender_id"];
//     $receiverid = $message["receiver_id"];
//     $text = $message["message"];
    
//    //var_dump($user);
// }