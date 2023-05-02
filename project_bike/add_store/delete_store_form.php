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

$data = $connection->query("SELECT * FROM stores;")->fetchAll(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </head>
  <body>    
    <form action="del_store_in_base.php" method="POST">
        <div id="stors" name="stors" aria-label="Default select example">
            <?php foreach ($data as $rowname=>$row) { ?>
                <input type="checkbox" name="store_<?php echo $row['store_id']?>" value="<?php echo $row['store_id'];?>"><?php echo $row['store_name'];?> <br>
            <?php } ?>
            </div>
        <input type="submit" value="submit">
    </form>
  </body>