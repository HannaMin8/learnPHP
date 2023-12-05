<?php
declare(strict_types=1);
include '../tests/testMap2Arrays.php';

class Map2Arrays {

    private $array =[];

    public function add(string $key, int $value): void {

        $this->array[] = [$key, $value];
        
    }

    public function get(string $searchKey) {

        foreach ($this->array as $numArr) {

            if ($numArr[0] === $searchKey) {
                return $numArr[1];
            } 
        }
        return null;

    }

    public function unset(string $searchKey): void {

        foreach ($this->array as $i => $numArr) {

            if ($numArr[0] === $searchKey) {
                unset($this->array[$i]);         
            } 
        }
    }   

    public function set(string $key, int $newValue): void  {

        foreach ($this->array as $i => $numArr) {
            
            if ($numArr[0] === $key) {
                $this->array[$i] = [$key, $newValue];     
                break;    
            } 
        }
    }
    
}
