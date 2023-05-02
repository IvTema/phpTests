<?php


class Car{
public $isStolen = false;
protected $wheelsAmount;
public $battaryCapacity;
public $price;
private $vin;

public function __construct($vin){
    $this->vin=$vin;
}

public function checkIsStolen($vin){
    if($vin==$this->vin){
        return true;
    } else {
        return false;
    } 
}
}


class Passengercar extends Car {
protected $wheelsAmount = 4;
public $passangerAmount = 5;
}


class Truck extends Car {
protected $wheelsAmount = 6;
public $capacity = 200;
}


$stolenCars = ['1a7c','2m3b'];
$lightCar = new Passengercar('1a7c');

foreach ($stolenCars as $stolenVin) {
    if ($lightCar -> checkIsStolen($stolenVin)){
        $lightCar -> isStolen = true;
    }
}

if ($lightCar -> isStolen){
    echo "Авто Украдено";
} else {
    echo 'Вы можете купить Авто';
}

var_dump($lightCar -> isStolen);
var_dump($lightCar->vin);