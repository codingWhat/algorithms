<?php
namespace listx;

require dirname(__DIR__)  . '/autoload.php';
$list = new Queue(4);

$list->enqueue(1);
$list->enqueue(2);
$list->enqueue(3);
$list->enqueue(4);
//var_dump($list->getItems());
echo  $list->dequeue() . PHP_EOL;
echo $list->dequeue() . PHP_EOL;
$list->enqueue(5);
$list->enqueue(6);
//var_dump($list->getItems());

echo $list->dequeue() . PHP_EOL;
echo $list->dequeue() . PHP_EOL;

$list->enqueue(6);
$list->enqueue(7);

 $list->dequeue();
 $list->dequeue();
$list->enqueue(8);
$list->enqueue(9);
$list->dequeue();
$list->enqueue(10);
$list->dequeue();
$list->dequeue();
$list->enqueue(20);
$list->enqueue(30);
var_dump($list->getItems());