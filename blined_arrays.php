<?php
$flights = require_once('arrays/planes.php');
$airports = require_once('arrays/airports.php');

//var_dump($flights);
//var_dump($airports);

//Вывести рейсы в следующем виде 10:30 Pulkovo -> Istanbul

foreach ($flights as $time=>$flight_info){
    echo($time) . " ";
    $matcher_from = array_key_exists($flight_info['From'], $airports);
    $matcher_to = array_key_exists($flight_info['To'], $airports);
    if ($matcher_from){
        echo $airports[$flight_info['From']] . ' -> ';
    }
    if ($matcher_to){
        echo $airports[$flight_info['To']]. "<br>";
    }
}