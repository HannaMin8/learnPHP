<?php
declare(strict_types=1);
include '../tests/testMapForeach.php';

class MapForeach {

    private $arrayKeys =[];
    private $arrayValues =[];

    public function add(string $key, int $value): void {

        $this->arrayKeys[] = $key;
        $this->arrayValues[]= $value;
        
    }

    public function get(string $searchKey) {
        
        foreach ($this->arrayKeys as $i => $value) {

            if ($this->arrayKeys[$i] === $searchKey) {
                return $this->arrayValues[$i];
            } 
        }
        return null;
    }

    public function unset(string $searchKey): void {

        foreach ($this->arrayKeys as $i => $value) {

            if ($value === $searchKey) {
                unset($this->arrayKeys[$i]);
                unset ($this->arrayValues[$i]);
            
            } 
        }
    }

    public function set(string $key, int $newValue): void  {

        foreach ($this->arrayKeys as $i => $value) {
            
            if ($value === $key) {
                $this->arrayValues[$i] = $newValue;
                break;
            } 
        }
    }

}
