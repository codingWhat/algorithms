<?php
namespace listx;

require __DIR__ . '/linkedList.php';


$linkedList = new LinkedList();

$linkedList->add(1);
$linkedList->add(2);
$linkedList->add(3);
$linkedList->printListItem();
$linkedList->del(2);
$linkedList->printListItem();

