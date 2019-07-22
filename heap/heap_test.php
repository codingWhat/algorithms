<?php

require __DIR__ . '/heap.php';

$factory = new HeapFactory();
$arr = [6, 3, 7, 1, 9];
var_dump($factory->staticBuildBigHeap($arr));
var_dump($factory->staticBuildSmallHeap($arr));
exit;
