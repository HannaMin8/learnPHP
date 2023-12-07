<?php
declare(strict_types=1);

class MapLinkedList {

    private $memory =[];
    private $nextIndex = null;
    
    public function getMemory(): array {
        return $this->memory;
    }

    
    public function add($key, $value): void {

        $this->memory[] = [$key, $value, null];

        if (count($this->memory) > 1) {
            $this->memory[count($this->memory) - 2][2] = count($this->memory) - 1;
        } 

        $this->nextIndex = count($this->memory) - 1;

    }
        
    public function get($searchKey) {

        if (count($this->memory) > 0) {
        $currentIndex = 0;

            while ($currentIndex !== null) {
                $currentArray = $this->memory[$currentIndex];

                    if ($currentArray[0] === $searchKey) {
                        return $currentArray[1];
                    } 

                $currentIndex = $currentArray[2];
            }
    
        }
        return null;
    }
    
    public function unset($searchKey): void {

        if (count($this->memory) > 0) {
        $currentIndex = 0;
        
            while ($currentIndex !== null) {
                
                $currentArray = $this->memory[$currentIndex];
                if ($currentArray[0] === $searchKey) {
                    if (count($this->memory) > 1) {
                        $nextIndex = $currentArray[2];            
                        $this->memory[$currentIndex - 1][2]  = $nextIndex;
                        unset($this->memory[$currentIndex]); 
                        $currentIndex = $nextIndex;
                        break;
                    }
                    unset($this->memory[$currentIndex]); 
                    $currentIndex = null;
                    break;
                } 
                $currentIndex = $currentArray[2];
            }    
        }
    }

    public function set(string $searchKey, int $newValue): void  {

        if (count($this->memory) > 0) {
        $currentIndex = 0;
        $prevIndex = 0;

            while ($currentIndex !== null) {
                $currentArray = $this->memory[$currentIndex];
                
                    if ($currentArray[0] === $searchKey) {
                        $this->memory[$currentIndex][1] = $newValue; 
                        break;
                    } 
                $currentIndex = $currentArray[2];
            }  
        }
    }
    
}