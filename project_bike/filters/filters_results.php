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

$storeID = $_GET['stors'];
$data = $connection->query("SELECT orders.order_id, order_date, last_name, SUM(list_price)  FROM orders
                            left join customers on customers.customer_id = orders.customer_id
                            left join order_items on order_items.order_id = orders.order_id
                            WHERE store_id = $storeID
                            group by orders.order_id;")->fetchAll(PDO::FETCH_ASSOC);
//and somewhere later:
// foreach ($data as $row) {
//     var_dump($row);
// }


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
<table>

<?php foreach ($data as $rowname=>$row) { ?>
    <tr> <td><?php echo $row['order_date'];?></td> <td> <?php echo $row['last_name'];?></td> <td> <?php echo $row['SUM(list_price)'];?></td> </tr>
<?php }?>