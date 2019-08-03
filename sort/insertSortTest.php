<?php

require __DIR__ . '/insertSort.php';

$arr = [1, 2, 3, 4, 5];
var_dump(insertSort($arr));
$arr = [5, 4, 3, 2, 1];
var_dump(insertSort($arr));
$arr = [1, 4, 6, 5, 1];
var_dump(insertSort($arr));