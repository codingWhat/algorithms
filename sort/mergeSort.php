<?php
/***********************概念介绍**********************************
 * @param $arr
 * @param $low
 * @param $high
 */

//归并排序(分治/分区)
//递推公式: T(a) = T(b) + T(c) + K
//T(1) = C， n=1时, 复杂度:常数级
//T(n) = 2 * T(n/2) + n , n>1
//T(n) = Cn + nlogN  => 复杂度O(nlogn)
//最好时间复杂度:nlogN
//最坏时间复杂度:nlogN
//平均时间复杂度:nlogN
//稳定排序算法
//空间复杂度:O(N), 非原地排序算法



function mergeSort(&$arr, $low, $high) {
    if ($low >= $high) return;
    $pivot = intval(( $low + $high ) / 2);
    mergeSort($arr, $low, $pivot);
    mergeSort($arr, $pivot+1, $high);
    merge($arr, $low, $high, $pivot);
}

function merge(&$arr, $low, $high, $pivot) {
    $tmp =[];
    $i = $low;
    $j = $pivot+1;
    $k = $low;
    while ($i <= $pivot && $j <= $high) {
        if ($arr[$i] <= $arr[$j]) {
            $tmp[$k++] = $arr[$i++];
        }else{
            $tmp[$k++] = $arr[$j++];
        }
    }

    while ($i <= $pivot) {
        $tmp[$k++] = $arr[$i++];
    }

    while ($j <= $high) {
        $tmp[$k++] = $arr[$j++];
    }

    for ($i = $low; $i <= $high; $i++) {
        $arr[$i] = $tmp[$i];
    }

}