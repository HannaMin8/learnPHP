<?php
declare(strict_types=1);
include '../map/mapLinkedList.php';

function testEmptyGet() {

    $m = new MapLinkedList();
    $v = $m->get('c');
    
    if ($v !== null) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

function testEmptyUnset() {

    $m = new MapLinkedList();
    $m->unset('x');
    $v = count($m->getMemory());
    
    if ($v !== 0) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

function testEmptySet() {

    $m = new MapLinkedList();
    $m->set('x', 999);
    $v = $m->get('x');
    
    if ($v !== null) {
        exit('FAIL ' . __FUNCTION__);
    } 

}


function testAddGet() {

    $m = new MapLinkedList();
    $m->add('x', 777);
    $v = $m->get('x');

    if ($v !== 777) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

function testAddUnset() {

    $m = new MapLinkedList();
    $m->add('x', 777);
    $m->unset('x');
    $v = $m->get('x');

    if ($v !== null) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

function testAddSet() {

    $m = new MapLinkedList();
    $m->add('x', 777);
    $m->set('x', 999);
    $v = $m->get('x');

    if ($v !== 999) {
        exit('FAIL ' . __FUNCTION__);
    } 

}

function testNextIndex() {

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

testEmptyGet();
testEmptyUnset();
testEmptySet();
testAddGet();
testAddUnset();
testAddSet();
testNextIndex();