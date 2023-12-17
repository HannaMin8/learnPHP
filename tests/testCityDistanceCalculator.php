<?php
declare(strict_types=1);
include '../map/cityDistanceCalculator.php';

function distanceBetweenCities() {

    $map = new Map();
    $map->add('Pesochin', 200);
    $map->add('Lozova', 800);
    var_dump($map);
    $calculator = new CityDistanceCalculator($map);
    var_dump($calculator);
    $result =  $calculator->distance('Pesochin', 'Lozova');
    var_dump($result);
    if ($result !== 600) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

distanceBetweenCities();
