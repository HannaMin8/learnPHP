<?php
declare(strict_types=1);
 
class Arrays {
    private $arrayKeys =[];
    private $arrayValues =[];

    public function addKeyValue(string $key, int $value): void {
        $this->arrayKeys[] = $key;
        $this->arrayValues[]= $value;
        
    }
    public function getValueByKey(string $searchKey) {
    $lenght = count($this->arrayKeys);
    for ($i = 0; $i < $lenght; $i++) {
        if ($this->arrayKeys[$i] === $searchKey) {
            return $this->arrayValues[$i];
        } 
    }
    return null;
}

public function unsetKeyValue(string $searchKey): void {
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
public function setKeyValue(string $key, int $newValue): void  {
    $lenght = count($this->arrayKeys);
    for ($i = 0; $i < $lenght; $i++) {
        if ($this->arrayKeys[$i] === $key) {
            $this->arrayValues[$i] = $newValue;
        } 
       
    }
   
}

}


/*
$newArray = new Arrays();
$newArray->addKeyValue('ggg', 8);
$newArray->addKeyValue('ttt', 90);
$newArray->addKeyValue('rrr', 222);
$newArray->addKeyValue('ppp', 1);
print_r($newArray);
echo "\n ---getValue('ggg')---\n";
var_dump($newArray->getValueByKey('ggg'));
echo "\n ---getValue('rrr')---\n";
var_dump($newArray->getValueByKey('rrr'));
echo "\n ---getValue('xxx') - которого нет в массиве---\n";
var_dump($newArray->getValueByKey('xxx'));
echo "\n ---unset('rrr')---\n"; 
var_dump($newArray->unsetKeyValue('rrr'));
//print_r($newArray);
echo "\n ---получить 'rrr'  и его значение---\n"; 
var_dump($newArray->getValueByKey('rrr'));
echo "\n ---добавление снова 'rrr'--\n";
var_dump($newArray->addKeyValue('rrr', 222));
echo "\n ---получить массив c новым 'rrr'---\n"; 
var_dump($newArray->setKeyValue('rrr', 1115));
*/
echo "\n ---testim---\n"; 
function testArraysAddGet() {
    $m = new Arrays();
    $m->addKeyValue('x', 777);

    $v = $m->getValueByKey('x');

    if ($v !== 777) {
        exit('FAIL ' . __FUNCTION__);
    } 
}

function testArraysAddUnset() {

    $m = new Arrays();
    $m->addKeyValue('x', 777);
    $m->unsetKeyValue('x');

    $v = $m->getValueByKey('x');

    if ($v !== null) {
        exit('FAIL ' . __FUNCTION__);
    } 
}
function testArraysAddSet() {

    $m = new Arrays();
    $m->addKeyValue('x', 777);
    $m->setKeyValue('x', 999);

    $v = $m->getValueByKey('x');

    if ($v !== 999) {
        exit('FAIL ' . __FUNCTION__);
    } 
}
testArraysAddGet();
testArraysAddUnset();
testArraysAddSet();

echo "\n------------with foreach-----------------\n";
class ArrayHandler {
    private $arrayKeys =[];
    private $arrayValues =[];

    public function addKeyValue(string $key, int $value): void {
        $this->arrayKeys[] = $key;
        $this->arrayValues[]= $value;
        
    }
    public function getValueByKey(string $searchKey) {
    $lenght = count($this->arrayKeys);
    for ($i = 0; $i < $lenght; $i++) {
        if ($this->arrayKeys[$i] === $searchKey) {
            return $this->arrayValues[$i];
        } 
    }
    return null;
}

public function unsetKeyValue(string $searchKey): void {
    foreach ($this->arrayKeys as $i => $value) {
        if ($value === $searchKey) {
            unset($this->arrayKeys[$i]);
            unset ($this->arrayValues[$i]);
           
        } 
    }
}
public function setKeyValue(string $key, int $newValue): void  {
    foreach ($this->arrayKeys as $i => $value) {
        if ($value === $key) {
            $this->arrayValues[$i] = $newValue;
        } 
       
    }
  
}

}

$newArrays = new ArrayHandler();
$newArrays->addKeyValue('ggg', 8);
$newArrays->addKeyValue('ttt', 90);
$newArrays->addKeyValue('rrr', 222);
$newArrays->addKeyValue('ppp', 1);
print_r($newArrays);
echo "\n ---getValue('ggg')---\n";
var_dump($newArrays->getValueByKey('ggg'));
echo "\n ---getValue('rrr')---\n";
var_dump($newArrays->getValueByKey('rrr'));
echo "\n ---getValue('xxx') - которого нет в массиве---\n";
var_dump($newArrays->getValueByKey('xxx'));
echo "\n ---unset('rrr')---\n"; 
$newArrays->unsetKeyValue('rrr');
print_r($newArrays);
echo "\n ---добавление снова 'rrr'--\n";
$newArrays->addKeyValue('rrr', 222);
print_r($newArrays);
echo "\n ---получить массив c новым 'rrr'---\n"; 
$newArrays->setKeyValue('rrr', 1115);
print_r($newArrays);

echo "\n ---testim---\n"; 
function testArrayHandlerAddGet() {
    $m = new ArrayHandler();
    $m->addKeyValue('x', 777);

    $v = $m->getValueByKey('x');

    if ($v !== 777) {
        exit('FAIL ' . __FUNCTION__);
    } 
}

function testArrayHandlerAddUnset() {

    $m = new ArrayHandler();
    $m->addKeyValue('x', 777);
    $m->unsetKeyValue('x');

    $v = $m->getValueByKey('x');

    if ($v !== null) {
        exit('FAIL ' . __FUNCTION__);
    } 
}
function testArrayHandlerAddSet() {

    $m = new ArrayHandler();
    $m->addKeyValue('x', 777);
    $m->setKeyValue('x', 999);

    $v = $m->getValueByKey('x');

    if ($v !== 999) {
        exit('FAIL ' . __FUNCTION__);
    } 
}
testArrayHandlerAddGet();
testArrayHandlerAddUnset();
testArrayHandlerAddSet();

echo "\n------------array of arrays-------------\n";
class ArrayOfArrays {
    private $array =[];

    public function addKeyValue(string $key, int $value): void {
        $this->array[] = [$key, $value];
        
    }
    public function getValueByKey(string $searchKey) {
        foreach ($this->array as $numArr) {
            if ($numArr[0] === $searchKey) {
                return $numArr[1];
            } 
    }
    return null;
}

    public function unsetKeyValue(string $searchKey): void {
        foreach ($this->array as $i => $numArr) {
            if ($numArr[0] === $searchKey) {
                unset($this->array[$i]);         
            } 
        }
    }   
    public function setKeyValue(string $key, int $newValue): void  {
        foreach ($this->array as $i => $numArr) {
            if ($numArr[0] === $key) {
                $this->array[$i] = [$key, $newValue];         
            } 
        }
    }
}

$newArrays = new ArrayOfArrays();
$newArrays->addKeyValue('ggg', 8);
$newArrays->addKeyValue('ttt', 90);
$newArrays->addKeyValue('rrr', 222);
$newArrays->addKeyValue('ppp', 1);
print_r($newArrays);
echo "\n ---getValue('ggg')---\n";
var_dump($newArrays->getValueByKey('ggg'));
echo "\n ---getValue('rrr')---\n";
var_dump($newArrays->getValueByKey('rrr'));
echo "\n ---getValue('xxx') - которого нет в массиве---\n";
var_dump($newArrays->getValueByKey('xxx'));
echo "\n ---unset('rrr')---\n"; 
$newArrays->unsetKeyValue('rrr');
print_r($newArrays);
echo "\n ---добавление снова 'rrr'--\n";
$newArrays->addKeyValue('rrr', 222);
print_r($newArrays);
echo "\n ---получить массив c установленным новым значением 'rrr'---\n"; 
$newArrays->setKeyValue('rrr', 1115);
print_r($newArrays);

echo "\n ---testim---\n"; 
function testArrayOfArraysAddGet() {
    $m = new ArrayOfArrays();
    $m->addKeyValue('x', 777);

    $v = $m->getValueByKey('x');

    if ($v !== 777) {
        exit('FAIL ' . __FUNCTION__);
    } 
}

function testArrayOfArraysAddUnset() {

    $m = new ArrayOfArrays();
    $m->addKeyValue('x', 777);
    $m->unsetKeyValue('x');

    $v = $m->getValueByKey('x');

    if ($v !== null) {
        exit('FAIL ' . __FUNCTION__);
    } 
}
function testArrayOfArraysAddSet() {

    $m = new ArrayOfArrays();
    $m->addKeyValue('x', 777);
    $m->setKeyValue('x', 999);

    $v = $m->getValueByKey('x');

    if ($v !== 999) {
        exit('FAIL ' . __FUNCTION__);
    } 
}
testArrayOfArraysAddGet();
testArrayOfArraysAddUnset();
testArrayOfArraysAddSet();