<?php
$foodTypes = require_once('arrays/food.php');
$ration = require_once('arrays/ration.php');

// Задача 3. Посчитать, сколько белков, жиров и углеводов пожиратель съел за неделю
// Задача 4. Посчитать, чего он съел за неделю больше - белков, жиров или углеводов 
// и вывести это в виде (например) "За неделю вы съели больше всего белков"

$fat; $proteins; $carbohydrates;

foreach ($ration as $date=>$foodIDs){
    foreach ($foodIDs as $foodID){
        foreach($foodTypes as $foodInfo){
            if ($foodInfo["id"] ==  $foodID){
                $fat += $foodInfo["fat"]; 
                $proteins += $foodInfo["proteins"];
                 $carbohydrates += $foodInfo["carbohydrates"];
            }
        }
    }
}

echo("fat: " . $fat . "</br> proteins: " . $proteins  . "</br> carbohydrates: " .  $carbohydrates. "</br>");

$massType = array("жиров" => $fat, "белков" => $proteins, "углеводов" => $carbohydrates);
$type = max($massType);
$definer = array_search($type, $massType);
echo("За неделю вы съели больше всего " . $definer);