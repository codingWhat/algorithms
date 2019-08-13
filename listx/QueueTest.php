<?php
namespace listx;

require __DIR__ . '/queue.php';


$list = new Queue(3);

$list->enqueue(1);
$list->enqueue(2);
$list->enqueue(3);
//var_dump($list->getItems());

$list->dequeue();
$list->dequeue();
$list->dequeue();
$list->dequeue();
var_dump($list->getItems());