<?php
namespace listx;

require dirname(__DIR__)  . '/autoload.php';

//循环队列会浪费一个空间
$list = new Queue(5);

$list->enqueue(1);
$list->enqueue(2);
$list->enqueue(3);
$list->enqueue(4);
$list->enqueue(5);  //无效

echo  $list->dequeue() . PHP_EOL;
echo $list->dequeue() . PHP_EOL;

$list->enqueue(6);
$list->enqueue(7);
echo $list->dequeue() . PHP_EOL;
echo $list->dequeue() . PHP_EOL;

$list->enqueue(9);
$list->enqueue(10);
$list->dequeue();
$list->dequeue();
$list->enqueue(30);
var_dump($list->getItems());