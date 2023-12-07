<?php
declare(strict_types=1);
include '../map/mapForeach.php';

function testEmpty() {

    $m = new MapForeach();
    $v = $m->get('c');
    
    if ($v !== null) {
        exit('FAIL ' . __FUNCTION__);
    } 
    
}

function testAddGet() {

    $m = new MapForeach();
    $m->add('x', 777);
    $v = $m->get('x');
    
    if ($v !== 777) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

function testAddUnset() {

    $m = new MapForeach();
    $m->add('x', 777);
    $m->unset('x');
    $v = $m->get('x');

    if ($v !== null) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

function testAddSet() {

    $m = new MapForeach();
    $m->add('x', 777);
    $m->set('x', 999);
    $v = $m->get('x');

    if ($v !== 999) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

function testAddUnsetGet() {

    $m = new MapForeach();
    $m->add('a', 000);
    $m->add('b', 111);
    $m->add('c', 222);
    $m->unset('b');
    $v = $m->get('c');
    
    if ($v !== 222) {
        exit('FAIL ' . __FUNCTION__);
    } 

}



testEmpty();
testAddGet();
testAddUnset();
testAddSet();
testAddUnsetGet();
