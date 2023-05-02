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


 $mushroomCounter = [];
 foreach ($forestsMushrooms as $mushroomANDforestID){
    if(!in_array($mushroomANDforestID['mushroom_id'], $mushroomCounter)){
        $mushroomCounter[] = $mushroomANDforestID['mushroom_id'];
    }
 }

 foreach ($mushroomCounter as $mushroomNAME=>$mushroomID){
    foreach ($mushrooms as $mushroomINFO){
        if($mushroomINFO['mushroom_id'] == $mushroomID){
            $mushroomCounter[$mushroomINFO['name']] = $mushroomCounter[$mushroomNAME];
            unset($mushroomCounter[$mushroomNAME]);
        }
    }
 }

 var_dump($mushroomCounter); // гриб - id


 $forestCounter = [];
 foreach ($forestsMushrooms as $mushroomANDforestID){
    if(!in_array($mushroomANDforestID['forest_id'], $forestCounter)){
        $forestCounter[] = $mushroomANDforestID['forest_id'];
    }
 }

 foreach ($forestCounter as $forestNAME=>$forestID){
    foreach ($forests as $forestINFO){
        if($forestINFO['forest_id'] == $forestID){
            $forestCounter[$forestINFO['name']] = $forestCounter[$forestNAME];
            unset($forestCounter[$forestNAME]);
        }
    }
 }

 var_dump($forestCounter); // лес - id


 foreach ($forestCounter as $forestNAME=>$forestID){
    echo $forestNAME . ': ';
    foreach ($forestsMushrooms as $mushroomANDforestID){
        if($forestID == $mushroomANDforestID['forest_id']){
            foreach ($mushroomCounter as $mushroomNAME=>$mushroomID){
                if ($mushroomANDforestID["mushroom_id"] == $mushroomID){
                    echo $mushroomNAME . ' ';
                }
            }
        }
    }
    echo '<br>';
 }

