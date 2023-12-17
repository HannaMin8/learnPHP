<?php
declare(strict_types=1);
include_once 'interface.php';

class Map2Arrays implements MapInterface {

    private $array =[];

    public function add(string $key, int $value): void {

        //$this->array[] = [$key, $value];
        $this->array[] = [0 => $key, 1 => $value];
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

    public function each(callable $callback): void {
        
        foreach ($this->array as $i => $numArr) {
            [$key, $value] = $this->array[$i];
            $callback($key, $value);
        }
    }
    
}
