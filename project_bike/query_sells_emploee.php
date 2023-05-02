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

$data = $connection->query("SELECT staffs.staff_id, staffs.first_name, staffs.last_name, SUM(list_price)  FROM orders
                            left join staffs on staffs.staff_id = orders.staff_id
                            left join order_items on order_items.order_id = orders.order_id
                            group by staffs.staff_id;")->fetchAll(PDO::FETCH_ASSOC);
//and somewhere later:
// foreach ($data as $row) {
//     var_dump($row);
//     foreach ($row as $bike)
//     echo $bike;
// }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<table>

<?php 
$max_summ = 0;
$max_stuff_id;
foreach ($data as $rowname=>$row) { 
  if ($row['SUM(list_price)'] > $max_summ){
    $max_summ = $row['SUM(list_price)'];
    $max_stuff_id = $row['staff_id'];
  }
}
foreach ($data as $rowname=>$row) { 
  if ($row['staff_id'] == $max_stuff_id){ ?>
    <tr style="background-color: gold;"> <td><?php echo $row['first_name'];?></td> <td><?php echo $row['last_name'];?></td> <td> <?php echo $row['SUM(list_price)'];?></td> </tr>
  <?php } else { ?>
    <tr> <td><?php echo $row['first_name'];?></td> <td><?php echo $row['last_name'];?></td> <td> <?php echo $row['SUM(list_price)'];?></td> </tr>
  <?php } ?>

<?php }
// var_dump($data);
?>