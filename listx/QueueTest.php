<?php
namespace listx;

require dirname(__DIR__)  . '/autoload.php';
$list = new Queue(3);

$list->enqueue(1);
$list->enqueue(2);
$list->enqueue(3);
//var_dump($list->getItems());

echo $list->dequeue();
echo $list->dequeue();
echo $list->dequeue();
echo $list->dequeue();
var_dump($list->getItems());