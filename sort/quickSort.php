<?php
/*****************说明**********************/
//快排(分治/分区)
//递归的时间复杂度可以用递推公式求解
// 快排递推公式 => T(quickSort(n...r)) = T(quick(n...q)) + T(quick(q....r))
//最好时间复杂度: O(nlgn)
//最坏时间复杂度: O(n^2) //若pivot选择为最大，需进行n次分区，每次分区需平均扫描大约n/2个元素，快排复杂复杂度退化成O(n^2)
//平均时间复杂度: O(nlgn)
//空间复杂度:O(1), 原地排序算法
//不稳定排序算法，

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


/*************** 快排的优化 ******************/
//优化点在于pivot的选择.
//1.三数取中法, 首/尾/中间取出这三个数的比较大小，将中间那个数作为分区点
//2.随机选取pivot，降低O(n^2)概率