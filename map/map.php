<?php
declare(strict_types=1);
include_once 'interface.php';

class Map implements MapInterface {

    private $arrayKeys =[];
    private $arrayValues =[];

    public function add(string $key, int $value): void {

        $this->arrayKeys[] = $key;
        $this->arrayValues[]= $value;
        
    }

    public function get(string $searchKey) {

        $lenght = count($this->arrayKeys);

        for ($i = 0; $i < $lenght; $i++) {
            
            if ($this->arrayKeys[$i] === $searchKey) {
                return $this->arrayValues[$i];
            } 
        }

        return null;

    }

    public function unset(string $searchKey): void {

        $lenght = count($this->arrayKeys);

        for ($i = 0; $i < $lenght; $i++) {

            if ($this->arrayKeys[$i] === $searchKey) {
                unset($this->arrayKeys[$i]);
                unset ($this->arrayValues[$i]);
            
            } 
        }

        $this->arrayKeys = array_values($this->arrayKeys);
        $this->arrayValues = array_values($this->arrayValues);
        
    }

    public function set(string $key, int $newValue): void  {

        $lenght = count($this->arrayKeys);

        for ($i = 0; $i < $lenght; $i++) {

            if ($this->arrayKeys[$i] === $key) {
                $this->arrayValues[$i] = $newValue;
                break;
            } 
        }
    }

    public function each(callable $callback): void {
        
        foreach ($this->arrayKeys as $i => $value) {
            $key = $this->arrayKeys[$i];
            $value = $this->arrayValues[$i];
            $callback($key, $value);
        }
    }

}
