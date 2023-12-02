<?php
declare(strict_types=1);
class LinkedList {
    private $memory =[];
    private $nextIndex = null;
    public function addKeyValue($key, $value): void {
        $this->memory[] = [$key, $value, null];
        if (count($this->memory) > 1) {
            $this->memory[count($this->memory) - 2][2] = count($this->memory) - 1;
        } 
        $this->nextIndex = count($this->memory) - 1;
    }
    public function getValueByKey($searchKey) {
        $currentIndex = 0;
        while ($currentIndex !== null) {
            $currentArray = $this->memory[$currentIndex];
            if ($currentArray[0] === $searchKey) {
                return $currentArray[1];
            } 
            $currentIndex = $currentArray[2];
        }
        return null;
    }
    public function unsetKeyValue($searchKey): void {
        $currentIndex = 0;
        $prevIndex = 0;
        while ($currentIndex !== null) {
            $currentArray = $this->memory[$currentIndex];
            if ($currentArray[0] === $searchKey) {
                $prevIndex = $currentArray[2];            
                $this->memory[$currentIndex - 1][2]  = $prevIndex;
                unset($this->memory[$currentIndex]); 
                $currentIndex = $prevIndex;
                break;
            } 
            $currentIndex = $currentArray[2];
        }    
    }   
    public function setValueByKey(string $searchKey, int $newValue): void  {
        $currentIndex = 0;
        $prevIndex = 0;
        while ($currentIndex !== null) {
            $currentArray = $this->memory[$currentIndex];
            if ($currentArray[0] === $searchKey) {
                $this->memory[$currentIndex][1] = $newValue; 
            } 
            $currentIndex = $currentArray[2];
        }  
    }
}
$newMemory = new LinkedList();
$newMemory->addKeyValue('ggg', 8);//1-num0
$newMemory->addKeyValue('ttt', 90);//2-num1
$newMemory->addKeyValue('rrr', 88);//3-num2
$newMemory->addKeyValue('ppp', 1);//4-num3
$newMemory->addKeyValue('hhhh', 222);//5-num4
$newMemory->addKeyValue('haha', 2020);//6-num5
print_r($newMemory);
echo "\n ---getValueByKey 'rrr'---\n"; 
echo($newMemory->getValueByKey('rrr'));
echo "\n ---unsetKeyValue 'ttt'---\n"; 
echo($newMemory->unsetKeyValue('ttt'));
print_r($newMemory);
echo "\n ---setValueByKey 'rrr'---\n"; 
$newMemory->setValueByKey('rrr', 808080);
print_r($newMemory);
/*
echo "\n ---testim---\n"; 
function testLinkedListAddGet() {
    $m = new LinkedList();
    $m->addKeyValue('x', 777);

    $v = $m->getValueByKey('x');

    if ($v !== 777) {
        exit('FAIL ' . __FUNCTION__);
    } 
}

function testLinkedListAddUnset() {

    $m = new LinkedList();
    $m->addKeyValue('x', 777);
    $m->unsetKeyValue('x');

    $v = $m->getValueByKey('x');

    if ($v !== null) {
        exit('FAIL ' . __FUNCTION__);
    } 
}
function testLinkedListAddSet() {

    $m = new LinkedList();
    $m->addKeyValue('x', 777);
    $m->setKeyValue('x', 999);

    $v = $m->getValueByKey('x');

    if ($v !== 999) {
        exit('FAIL ' . __FUNCTION__);
    } 
}
testLinkedListAddGet();
testLinkedListAddUnset();
//testLinkedListAddSet();
  
*/