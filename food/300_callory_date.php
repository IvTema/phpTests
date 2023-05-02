<?php
$foodTypes = require_once('arrays/food.php');
$ration = require_once('arrays/ration.php');

// Задача 2. Вывести на экран даты, когда любитель покушать употребил блюд более чем на 300 калорий


foreach ($ration as $date=>$foodIDs){
    $callory_counter = 0;
    foreach ($foodIDs as $foodID){
        foreach($foodTypes as $foodInfo){
            if ($foodInfo["id"] ==  $foodID){
                $callory_counter += $foodInfo["calories"];
            }
        }
    }
    if ($callory_counter >= 300){
        echo ($date . '</br>');
    }
}