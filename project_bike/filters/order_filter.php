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

$storeID = 1;
$data = $connection->query("SELECT * FROM stores;")->fetchAll(PDO::FETCH_ASSOC);
//and somewhere later:
// foreach ($data as $row) {
//     var_dump($row);
// }
// var_dump($data);

// foreach ($data as $rowname=>$row) { 
// var_dump($row['store_id']);
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
    
    <form action="filters_results.php" method="GET" target="_blank">
        <select id="stors" name="stors" class="form-select" aria-label="Default select example">
            <?php foreach ($data as $rowname=>$row) { ?>
                <option value="<?php echo $row['store_id'];?>"><?php echo $row['store_name'];?></option>
            <?php } ?>
        </select>
        <input type="submit" value="submit">
    </form>