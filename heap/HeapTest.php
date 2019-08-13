<?php
namespace heap;

require  dirname(__DIR__) . '/autoload.php';
//create 'normal' heap instance
/** @var Heap $heap */
$heap = HeapFactory::make();
$arr = [6, 3, 7, 1, 9];
$heap->staticBuildBigHeap($arr);
var_dump($arr);
$heap->staticBuildSmallHeap($arr);
var_dump($arr);
