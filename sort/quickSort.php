<?php
/*****************说明**********************/
//快排
// 快排递推公式 => T(quickSort(n...r)) = T(quick(n...q)) + T(quick(q....r))
//最好时间复杂度: O(lgN)
//最坏时间复杂度: O
//平均时间复杂度:
//空间复杂度:O(1)
//稳定排序算法，

main();
function main() {
    $arr = [5,4,3,2, 1];
    quickSort($arr,0, count($arr)-1);
    var_dump($arr);
    $arr = [1,2,3,4,5];
    quickSort($arr,0, count($arr)-1);
    var_dump($arr);
    $arr = [2,43,13,22, 41];
    quickSort($arr,0, count($arr)-1);
    var_dump($arr);
}


function quickSort(&$arr, $start, $end) {
    if ($start >= $end) return;
    $pivot = partition($arr, $start, $end);

    quickSort($arr, $start, $pivot-1);
    quickSort($arr, $pivot+1, $end);
}

function partition(&$arr, $start, $end) {

    $left = $start;
    $right = $end-1;
    $pivot = $arr[$end];
    while(true) {
        while ($arr[$left] < $pivot) $left++;

        if ($left == $end) {
            return $left;
        }

        while ($arr[$right] > $pivot) $right--;

        if ($left < $right) {
            $tmp = $arr[$right];
            $arr[$right] = $arr[$left];
            $arr[$left] = $tmp;
            continue;
        }else {
            $tmp = $arr[$left];
            $arr[$left] = $pivot;
            $arr[$end] = $tmp;
            return $left;
        }
    }

}
=======

function quickSort(&$arr,$low, $high){
    if ($low >= $high) {
        break;
    }
    $pivot = getPivot($arr, $low, $high);
    quickSort($arr, $low, $pivot-1);
    quickSort($arr, $pivot + 1, $high);
}

function getPivot(&$arr, $start, $end) {

    $left = 0;
    $right = $end - 1;
    $pivot = $arr[$right];
    while (true) {
        while ($arr[$left++] >= $pivot) break;
        if ($left == $end) {
            return $left;
        }
        while ($arr[$right--] < $pivot) break;

        if ($left < $right) {
             $tmp = $arr[$right];
             $arr[$right] = $arr[$left];
             $arr[$left] = $tmp;
        }else {

        }
    }
}
