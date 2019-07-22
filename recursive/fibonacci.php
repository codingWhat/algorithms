<?php

//echo fibonacciSum(20);
echo fibonacciSum(1000);
//斐波那契- 动态规划思想
function fibonacciSum($num) {

    $arr[1] = 1;
    $arr[2] = 2;

    for ($i = 3 ; $i <= $num; $i++) {
        $arr[$i] = $arr[$i-1] + $arr[$i-2];
    }

    return $arr[$num];
}


//递归实现
//echo fibonacci(1000);
function fibonacci( $num) {
    if ($num < 1) return 0;

    if ($num == 1)  return 1;

    if ($num == 2) return 2;


    return fibonacci($num - 1) + fibonacci($num - 2);
}