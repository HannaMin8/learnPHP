<?php
declare(strict_types=1);
include 'map.php';
include 'map2Arrays.php';
include 'mapForeach.php';
include 'mapLinkedList.php';
include_once 'interface.php';

class CityDistanceCalculator {

    private $map;
    public function __construct(MapInterface $map) {

        $this->map = $map;

    }

    public function distance(string $city1, string $city2){

        $city1 = $this->map->get($city1);
        $city2 = $this->map->get($city2);

        if (isset($city1) && isset($city2)){ 
            $distance = abs(abs($city1) - abs($city2));
            return $distance;
        } else {
            return null;
        }
    }
     
}