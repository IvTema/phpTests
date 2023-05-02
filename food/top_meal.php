<?php
$foodTypes = require_once('arrays/food.php');
$ration = require_once('arrays/ration.php');

// Задача 1. Вывести на экран информацию о блюде, которое наш пользователь ел чаще остальных

$all_index = array();
foreach ($ration as $date=>$foodIDs){
    foreach ($foodIDs as $foodID){
        if (!in_array($foodID, $all_index)){
            // $all_index[] = $foodID;
            // array_push($all_index, $foodID);
            $all_index += [$foodID=>$foodID];

        } 
    }
}

$counter = array();

foreach($ration as $date=>$rationFoodIDs){
    // var_dump($foodIDs);
    foreach ($all_index as $id=>$indexFoodID){
        // var_dump($indexFoodID);
        foreach($rationFoodIDs as $idID => $trueID){
            //var_dump($trueID . "", $indexFoodID);
                foreach($foodTypes as $foodInfo){
                    if ($trueID == $indexFoodID and $foodInfo["id"] == $indexFoodID){
                    $counter[$foodInfo["name"]] += 1;
                    // var_dump($counter);
                }
            }
        }
    }
}

// var_dump($counter);

$offenDishNames = []; 
$topDish;
$offenDishEatTimes = 0;

foreach($counter as $dishName=>$dishEaten){
    if ($offenDishEatTimes <= $dishEaten){
        $topDish = $dishName;
        $offenDishEatTimes = $dishEaten;
        // var_dump($topDish, $offenDishEatTimes);
    }
}

$offenDishNames[$topDish] = $offenDishEatTimes;
// var_dump($offenDishNames);

foreach($counter as $dishName=>$dishEaten){
    foreach ($offenDishNames as $name=>$ammount){
        if ($dishEaten == $ammount){
            $offenDishNames[$dishName] = $dishEaten;
        }
    }
}

var_dump($offenDishNames);