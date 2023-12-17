<?php
declare(strict_types=1);
include '../map/map2Arrays.php';

function testAddGet() {

    $m = new Map2Arrays();
    $m->add('x', 777);
    $v = $m->get('x');

    if ($v !== 777) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

function testAddUnset() {

    $m = new Map2Arrays();
    $m->add('x', 777);
    $m->unset('x');
    $v = $m->get('x');

    if ($v !== null) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

function testAddSet() {

    $m = new Map2Arrays();
    $m->add('x', 777);
    $m->set('x', 999);
    $v = $m->get('x');

    if ($v !== 999) {
        exit('FAIL ' . __FUNCTION__);
    } 
    
}

function each() {
    $map = new Map2Arrays();
    $map->add('a', 777);
    $map->add('b', 888);
    $map->add('c', 999);
    $visitedElements = [];
    $map->each(function ($key, $value) use (&$visitedElements){
        
        $visitedElements[] = ['key' => $key, 'value' => $value];
       
    });
    var_dump( $visitedElements);

    if ([['key' => 'a', 'value' => 777], 
    ['key' => 'b', 'value' => 888],
    ['key' => 'c', 'value' => 999]] !== $visitedElements) {
        exit('FAIL ' . __FUNCTION__);
    } 
}

testAddGet();
testAddUnset();
testAddSet();
each();