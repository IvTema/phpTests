<?php
$genres = [
    0 => 'Мелодрама',
    1 => 'Боевик',
    2 => 'Триллер',
    3 => 'Фильм ужасов',
    4 => 'Комедия'
];

$years = [
    0 => '1970-80',
    1 => '1980-90',
    2 => '1990-00',
    3 => '2000-10',
    4 => '2010-20'
];

$director = [
    0 => 'Кубрик',
    1 => 'Нолан',
    2 => 'Кємерон'
];

$films = [
    [
        'name' => 'Терминатор 2',
        'poster' => 'https://m.media-amazon.com/images/M/MV5BMGU2NzRmZjUtOGUxYS00ZjdjLWEwZWItY2NlM2JhNjkxNTFmXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_.jpg',
        'genres' => [
            2,
            3
        ],
        'years' => 1,
        'director' => 2
    ],
    [
        'name' => 'Терминатор',
        'poster' => 'https://www.arthipo.com/image/cache/catalog/poster/movie/759-1554/pfilm1370-the-terminator_5c23bc09-film-movie-posters-cinema-kanvas-tablo-canvas-1000x1000.jpg',
        'genres' => [
            2,
            3
        ],
        'years' => 1,
        'director' => 2
    ],
    [
        'name' => 'Преследование',
        'poster' => 'https://static.hdrezka.ac/i/2016/8/6/vdd96896ca070hs93p19z.jpg',
        'genres' => [
            2
        ],
        'years' => 2,
        'director' => 1
    ],
    [
        'name' => 'Бэтмен',
        'poster' => 'https://www.indiewire.com/wp-content/uploads/2016/09/the-dark-knight.jpg?w=800',
        'genres' => [
            1,
            2
        ],
        'years' => 3,
        'director' => 1
    ],
    [
        'name' => 'Космическая одиссея',
        'poster' => 'https://cdn1.ozone.ru/s3/multimedia-j/c1000/6193417183.jpg',
        'genres' => [
            2
        ],
        'years' => 2,
        'director' => 0
    ],
    [
        'name' => 'Заводной апельсин',
        'poster' => 'https://ir.ozone.ru/s3/multimedia-2/c1000/6190788878.jpg',
        'genres' => [
            2, 
            1
        ],
        'years' => 1,
        'director' => 0
    ],
];
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
            <input name = "basket_<?php echo $key; ?>" type="checkbox" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
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