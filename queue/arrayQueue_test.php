<?php

require  __DIR__ . '/arrayQueue.php';

// 基础版本测试
$queue = new ArrayQueue(4);
$queue->enQueue(1);
$queue->enQueue(2);
$queue->enQueue(3);
var_dump($queue->enQueue(4));
var_dump($queue->deQueue());
var_dump($queue->deQueue());
var_dump($queue->deQueue());
var_dump($queue->deQueue());
var_dump($queue->deQueue());


//优化版本测试
$aQueueA = new ArrayQueueAdvanced(3);

$aQueueA->enqueue(1);
$aQueueA->enqueue(2);
$aQueueA->enqueue(3);

echo $aQueueA->dequeue();
echo $aQueueA->dequeue();

$aQueueA->enqueue(5);
//$aQueueA->enqueue(5);
//$aQueueA->enqueue(6);



$aQueueA->printItems();
$aQueueA->isFull();


