<?php
namespace listx;

require dirname(__DIR__)  . '/autoload.php';
$list = new Queue(4);

$list->enqueue(1);
$list->enqueue(2);
$list->enqueue(3);
$list->enqueue(4);
var_dump($list->getItems());
echo  $list->dequeue();
echo $list->dequeue();
echo $list->dequeue();
echo $list->dequeue();
var_dump($list->getItems());

$list->enqueue(5);
$list->enqueue(6);
$list->enqueue(7);
echo PHP_EOL;
//echo  $list->dequeue();
var_dump($list->getItems());