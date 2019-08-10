<?php
namespace sort;

require dirname(__DIR__) . '/autoload.php';

$arr = [7, 3, 1, 4, 5];
$heapSortApi = new HeapSort($arr);

var_dump($heapSortApi->doIt());
