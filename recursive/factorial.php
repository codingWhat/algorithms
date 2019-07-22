<?php

function factorial_recursive($num) {

    if ($num < 0 ) throw new Exception("minus doesnt have factorial.");

    if ($num == 0) return 1;

    return $num * factorial_recursive($num - 1);
}

echo  factorial_recursive(100);

echo PHP_EOL;
echo  factorial_dynamic(99);

function factorial_dynamic($num) {
    if ($num < 0 ) throw new Exception("minus doesnt have factorial.");

    $arr[1] = 1;

    for ($i = 2; $i <= $num; $i++) {
        $arr[$i] = $arr[$i - 1] * $i;
    }

    return $arr[$num];
}