<?php

require __DIR__ . '/mergeSort.php';

$arr = [5,4,3,2,1];
mergeSort($arr, 0, 4);
var_dump($arr);
$arr1 = [1,2,3,4,5];
mergeSort($arr1, 0, 4);
var_dump($arr1);
$arr2 = [2,4,6,1,9];
mergeSort($arr2, 0, 4);
var_dump($arr2);
