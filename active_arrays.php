<?php
$flights = require_once('arrays/planes.php');
$airports = require_once('arrays/airports.php');
$statuses = require_once('arrays/flight_statuses.php');

// var_dump($flights);
// var_dump($airports);
// var_dump($statuses);

//Вывести рейсы в следующем виде 10:30 Pulkovo -> Istanbul


foreach ($flights as $time=>$flight_info){
    $matcher_from = array_key_exists($flight_info['From'], $airports);
    $matcher_to = array_key_exists($flight_info['To'], $airports);
    $matcher_active = array_key_exists($flight_info['Code'],$statuses);
    $active = $statuses[$flight_info['Code']] == "Active";
    if ($matcher_active and $active){
        echo($time) . " ";
        if ($matcher_from){
            echo $airports[$flight_info['From']] . ' -> ';
        }
        if ($matcher_to){
            echo $airports[$flight_info['To']]. "<br>";
        }
    }
}