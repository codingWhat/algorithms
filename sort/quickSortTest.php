<?php


require __DIR__ . '/quickSort.php';


$arr = [5, 4, 3, 2, 1];
quickSort($arr, 0, count($arr) - 1);
var_dump($arr);
$arr = [1, 2, 3, 4, 5];
quickSort($arr, 0, count($arr) - 1);
var_dump($arr);
$arr = [2, 43, 13, 22, 41];
quickSort($arr, 0, count($arr) - 1);
var_dump($arr);