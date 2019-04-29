<?php

/***********************概念介绍***********************************/
//插入排序
//最好时间复杂度:O(n)
//最坏时间复杂度:o(n^2)
//平均时间复杂度: o(n^2)
//稳定性:稳定,相同元素排序前后，顺序不变
//原地排序算法，不需要额外的存储空间, 空间复杂度:O(1)
$arr = [1, 2, 3, 4, 5];
var_dump(insertSort($arr));
$arr = [5, 4, 3, 2, 1];
var_dump(insertSort($arr));
$arr = [1, 4, 6, 5, 1];
var_dump(insertSort($arr));
function insertSort($arr) {
    if (!is_array($arr)) {
        return false;
    }
    $len = count($arr);
    if ($len <= 1) {
        return $arr;
    }

    for ($i = 1; $i < $len; $i++) {
        $tmp = $arr[$i];
        for ($j = $i; $j > 0; $j--) {
            if ($arr[$j-1] > $tmp) {
                $arr[$j] = $arr[$j - 1];
            }else {
                break;
            }
        }
        $arr[$j] = $tmp;
    }
    return $arr;
}