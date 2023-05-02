<?php
$forests = require_once('arrays/forests.php');
$mushrooms = require_once('arrays/mushrooms.php');
$forestsMushrooms = require_once('arrays/forests_mushrooms.php');

// var_dump($forests);
// var_dump($mushrooms);
// var_dump($forestsMushrooms);

/**
 * Задача 1
 * Вывести на экран все грибы, которые могут быть найдены в 3 и более лесах
 * 
 * Задача 2
 * Вывести на экран леса со списками грибов, которые в нем обитают
 * 
 * Задача 3
 * Вывести на экран грибы со списком лесов, где их можно найти
 */


//  $mushroomCounter = [];
//  foreach ($forestsMushrooms as $mushroomANDforestID){
//     if(!in_array($mushroomANDforestID['mushroom_id'], $mushroomCounter)){
//         $mushroomCounter[] = $mushroomANDforestID['mushroom_id'];
//     }
//  }

//  //var_dump($mushroomCounter);

//  foreach ($mushroomCounter as $mushroomNAME=>$mushroomID){
//     foreach ($mushrooms as $mushroomINFO){
//         if($mushroomINFO['mushroom_id'] == $mushroomID){
//             $mushroomCounter[$mushroomINFO['name']] = $mushroomCounter[$mushroomNAME];
//             unset($mushroomCounter[$mushroomNAME]);
//         }
//     }
//  }

//  var_dump($mushroomCounter);


//  $locationCounter;
//  foreach ($mushroomCounter as $mushroomName=>$mushroom){

//     foreach ($forestsMushrooms as $mushroomANDforestID){
//         if ($mushroomANDforestID['mushroom_id'] == $mushroom){
//             $locationCounter++;
//         }
    
//     }
//     // echo($locationCounter . '<br>');
//     if ($locationCounter >= 3){
//         echo $mushroomName . ': '. $locationCounter . ' леса <br>';
//     }
//     $locationCounter = 0;
// }


 foreach ($mushrooms as $mushroomItem){
    $mushroom = $mushroomItem['mushroom_id'];
    $mushroomName = $mushroomItem['name'];
    foreach ($forestsMushrooms as $mushroomANDforestID){
        if ($mushroomANDforestID['mushroom_id'] == $mushroom){
            $locationCounter++;
        }
    
    }
    // echo($locationCounter . '<br>');
    if ($locationCounter >= 3){
        echo $mushroomName . ': '. $locationCounter . ' леса <br>';
    }
    $locationCounter = 0;
}