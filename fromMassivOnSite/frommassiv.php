<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    <!-- <div class="card" style="width: 18rem;">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/47/Hamburger_%28black_bg%29.jpg/800px-Hamburger_%28black_bg%29.jpg" class="card-img-top" alt="...">
      <div class="card-body">
      <h5 class="card-title">BURGER 100TL</h5>
      <p class="card-text">BEST FKN BURGER</p>
      <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
              to basket
          </label>
      </div>
      <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
          <label class="form-check-label" for="flexCheckChecked">
              double
          </label>
      </div>
      <a href="#" class="btn btn-primary">BUY</a>
      </div>
    </div> -->
    <form action='./basket.php' method="POST">
      <?php
      $food = require_once('./massive_food.php');
      // var_dump($food);
      foreach ($food as $key=>$dish){
        ?>
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $dish['image']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title"><?php echo $dish['name'].' ('.$dish['price'].'TL)'; ?></h5>
        <p class="card-text">BEST FKN BURGER</p>
        <div class="form-check">
            <input name = "basket_<?php echo $key; ?>" type="checkbox" class="form-check-input" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                to basket
            </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
            <label class="form-check-label" for="flexCheckChecked">
                double
            </label>
        </div>
        </div>
      </div>
      <?php
      };
      ?>
      <input type='submit' class="btn btn-primary">
    </form>
</body>
</html>