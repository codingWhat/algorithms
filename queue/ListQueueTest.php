<?php
namespace queue;


$listQueue = new ListQueue(3);

$listQueue->enqueue(3);
$listQueue->enqueue(4);
$listQueue->enqueue(5);
//$listQueue->enqueue(5);
//$listQueue->enqueue(5);
$listQueue->dequeue();
$listQueue->dequeue();
//$listQueue->dequeue();
$listQueue->enqueue(7);
$listQueue->enqueue(6);
$listQueue->enqueue(9);
$listQueue->isFull();

$listQueue->printItems();


