<?php
declare(strict_types=1);
include '../map/mapLinkedList.php';

function emptyGet() {

    $m = new MapLinkedList();
    $v = $m->get('c');
    
    if ($v !== null) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

function emptyUnset() {

    $m = new MapLinkedList();
    $m->unset('x');
    $v = count($m->getMemory());
    
    if ($v !== 0) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

function emptySet() {

    $m = new MapLinkedList();
    $m->set('x', 999);
    $v = $m->get('x');
    
    if ($v !== null) {
        exit('FAIL ' . __FUNCTION__);
    } 

}


function addGet() {

    $m = new MapLinkedList();
    $m->add('x', 777);
    $v = $m->get('x');

    if ($v !== 777) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

function addUnset() {

    $m = new MapLinkedList();
    $m->add('x', 777);
    $m->unset('x');
    $v = $m->get('x');

    if ($v !== null) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

function addSet() {

    $m = new MapLinkedList();
    $m->add('x', 777);
    $m->set('x', 999);
    $v = $m->get('x');

    if ($v !== 999) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

function nextIndex() {

    $m = new MapLinkedList();
    $m->add('a', 000);
    $m->add('b', 111);
    $m->add('c', 222);
    $m->unset('b');
    $v = $m->get('c');
    
    if ($v !== 222) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

function eachGet() {
    $m = new Map();
    $m->add('a', 777);
    $m->add('b', 888);
    $m->add('c', 999);
    $v = $m->each(function ($key, $value){
        var_dump($key, $value);
    });
    if ($v !== [['a', 777], ['b', 888], ['c', 999]]) {
        exit('FAIL ' . __FUNCTION__);
    } 
}

function eachEmpty() {
    $m = new Map();
    $v = $m->each(function ($key, $value){
        var_dump($key, $value);
    });
    if ($v !== null) {
        exit('FAIL ' . __FUNCTION__);
    } 
}

function each() {
    $map = new MapLinkedList();
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




emptyGet();
emptyUnset();
emptySet();
addGet();
addUnset();
addSet();
nextIndex();
each();