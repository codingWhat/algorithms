<?php

require  __DIR__ . 'PriorityQueue.php';

$queue = new PriorityQueue(4);

$queue->add(10);
$queue->add(6);
$queue->add(12);
$queue->add(4);

for ($i = 0; $i < 4; $i++) {
    echo  $queue->poll();
}